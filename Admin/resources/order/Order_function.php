<?
class ORDER
{
    var $cartId    = null;
    var $sachma   = null;
    var $cartDetailId  = null;
    var $userId   = null;
    var $qty = null;
    var $created_at  = null;
    var $total  = null;


    // Function cart
    function addCart($userid, $sachma, $qty)
    {
        $db = new connect();
        $select = " INSERT INTO `order` (user_id , order_total_payment) 
        VALUES ($userid,0);
        SET @product_id = LAST_INSERT_ID();
        INSERT INTO order_detail (order_id , product_id, order_quantity) 
        VALUES (@product_id, $sachma, $qty)
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    // INSERT INTO `cartdetail` ( `cartId`, `sachma`, `soluong`, `created_at`)
    // VALUES ( '4', '24', '6', CURRENT_TIMESTAMP)
    function addCartDetails($userid, $sachma, $soluong)
    {
        $db = new connect();
        $idn = $this->DuplicateColumnCart($userid);
        $newidn = intval($idn);
        $select = "INSERT INTO `order_detail` (`order_id` ,  `product_id` ,  `order_quantity`) 
        VALUES ('$newidn' ,'$sachma', '$soluong')
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function DuplicateColumnCart($userid)
    {
        $db = new connect();
        $select = "SELECT * FROM `order` WHERE user_id  = $userid";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['order_id'];
        }
    }
    public function DuplicateCartPro($productId, $userid)
    {
        $db = new connect();
        $select = "SELECT * FROM order_detail ,`order` 
        WHERE `order`.order_id = order_detail.order_id 
        AND `order`.user_id = $userid
        ";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['product_id'];
            if ($productId == $nw) {
                return true;
            }
        }
    }
    public function DuplicateCart($user_id)
    {
        $db = new connect();
        $select = "SELECT * FROM `order`";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['user_id'];
            if ($user_id == $nw) {
                return true;
            }
        }
    }
    function updateCartQty($detailCommentId, $cartQty)
    {
        $db = new connect();
        $select = "UPDATE `order_detail` SET order_quantity = $cartQty  WHERE order_detail_id    = $detailCommentId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    
    function updateCartQtyDup($product_id, $cartQty)
    {
        $db = new connect();
        $select = "UPDATE order_detail SET order_quantity = order_quantity + $cartQty WHERE order_detail.product_id = $product_id
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function updateCartTotal($userId, $total)
    {
        $db = new connect();
        $select = "UPDATE `order` SET order_total_payment = order_total_payment + $total  WHERE user_id  = $userId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function AddPayment2($userId)
    {
        $db = new connect();
        $select = "INSERT INTO payment (cartdetailId , cartId , sachma ,soluong, created_at, userId)
        SELECT cartdetailId , cartdetail.cartId , sachma ,soluong, created_at, userId
        FROM cartdetail,cart
        WHERE cartdetail.cartId = cart.cartId
        AND cartdetail.cartId IN (
        SELECT cartId FROM cart WHERE userId = $userId
        )";
        $result = $db->pdo_execute($select);
        return $result;
    }

    function getInfoPayment($userid, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM user , order , order_detail
        WHERE user.user_id = order.user_id
        AND order_detail.order_id = order.order_id
        AND cart.cartId IN (
            SELECT order_id FROM payment
            WHERE order.user_id = $userid
            )";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function existTable($userid)
    {
        $db = new connect();
        $select = "SELECT count(order.order_id) FROM order, order_id
        WHERE order.order_id = order_detail.order_id
        AND cart.userId = $userid";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['count(order.order_id)'];
        }
    }




    function deleteCart($userid)
    {
        $db = new connect();
        $sql = "DELETE FROM cart WHERE cart.userId = $userid";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function getInfoUserOrder($userid, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM user , `order` , order_detail
        WHERE user.user_id = `order`.user_id
        AND `order`.order_id = order_detail.order_id
        AND
        `order`.`user_id` = $userid";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function deleteCartDetail($userID)
    {
        $db = new connect();
        $sql = "
        DELETE FROM cartdetail 
        WHERE cartdetail.cartDetailId IN (
        SELECT tempTable.cartDetailId
        FROM (
        SELECT cd.cartDetailId
        FROM cart c, cartdetail cd 
        WHERE c.cartId = cd.cartId 
        AND c.userId = $userID
    ) AS tempTable
);
        ";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    // function deleteCartDetailUser($productID)
    // {
    //     $db = new connect();
    //     $sql = "DELETE FROM cartdetail WHERE cartdetail.userId  = $productID";
    //     $result = $db->pdo_execute($sql);
    //     return $result;
    // }




    function CountCart($userID)
    {
        $db = new connect();
        $sql = "SELECT COUNT(cartdetail.cartId) FROM cart, cartdetail
        WHERE cart.cartId = cartdetail.cartId
        AND cart.userId =  $userID";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(cartdetail.cartId)'];
        }
    }

    function LastesCart($CartId)
    {
        $db = new connect();
        $sql = "SELECT MIN(cartdetail.created_at) AS 'lasted' FROM cartdetail 
        WHERE cartdetail.cartId = $CartId
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['lasted'];
        }
    }


    function NewestCart($CartId)
    {
        $db = new connect();
        $sql = "SELECT MAX(cartdetail.created_at) AS 'newest' FROM cartdetail 
        WHERE cartdetail.cartId = $CartId
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['newest'];
        }
    }


    function deleteCartDetailAd($productID)
    {
        $db = new connect();
        $sql = "DELETE FROM cartdetail WHERE cartdetail.cartDetailId = $productID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    // Function comment



    function getInfoComment()
    {
        $db = new connect();
        $sql = "SELECT * FROM comment";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function DuplicateColumn($productid)
    {
        $db = new connect();
        $select = "SELECT * FROM comment";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['sachma'];
            if ($productid == $nw) {
                return true;
            }
        }
    }







    function getInfoUserCmtAll($productId, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM comment cmt , detailcomments dt WHERE dt.cmtId = cmt.cmtId AND sachma = '$productId'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoUserCmt($productId)
    {
        $db = new connect();
        $sql = "SELECT cmtId FROM comment WHERE sachma = '$productId'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['cmtId'];
        }
    }

    function update_cmt($detailCommentId, $content)
    {
        $db = new connect();
        $select = "UPDATE detailcomments SET content = '$content'  WHERE detailCommentId  = $detailCommentId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function CountAllCmtDetails()
    {
        $db = new connect();
        $sql = "SELECT COUNT(detailcommentId) FROM detailcomments";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(detailcommentId)'];
        }
    }
}
// include('../../database/pdo.php');

// $cmt = new comment();
// echo $cmt->DuplicateColumnCmt(26);
// if($cmt->DuplicateColumn(23)){
//     echo 'đúng';
// }else{
//     echo 'sai';

// }


?>

<?
// INSERT INTO comment (sachma) 
// VALUES (24);
// SET @product_id = LAST_INSERT_ID();
// INSERT INTO detailcomments (cmtId, userid, content) 
// VALUES (@product_id, 6, 'Giá trị 1'),
//        (@product_id, 1, 'Giá trị 2');
?>