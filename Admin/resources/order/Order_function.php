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
        $select = " INSERT INTO cart (userId , total) 
        VALUES ($userid,0);
        SET @product_id = LAST_INSERT_ID();
        INSERT INTO cartdetail (cartId, sachma, soluong,`created_at`) 
        VALUES (@product_id, $sachma, $qty, CURRENT_TIMESTAMP)
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
        $select = "INSERT INTO `cartdetail` (`cartId` ,  `sachma` ,  `soluong`) 
        VALUES ('$newidn' ,'$sachma', '$soluong')
        ";
        $result = $db->pdo_execute($select);
        return $result;
    }
    public function DuplicateColumnCart($userid)
    {
        $db = new connect();
        $select = "SELECT * FROM cart WHERE userId  = $userid";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['cartId'];
        }
    }

    // function AddPayment($userId)
    // {
    //     $db = new connect();
    //     $select = "INSERT INTO payment (cartdetailId , cartId , sachma ,soluong, created_at)
    //     SELECT cartdetailId , cartId , sachma ,soluong, created_at
    //     FROM cartdetail
    //     WHERE cartdetail.cartId IN (
    //     SELECT cartId FROM cart WHERE userId = $userId
    //     ) ";
    //     $result = $db->pdo_execute($select);
    //     return $result;
    // }

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
        $sql = "SELECT * FROM user , cart , cartdetail
        WHERE user.userid = cart.userId
        AND cartdetail.cartId = cart.cartId
        AND cart.cartId IN (
            SELECT cartId FROM payment
            WHERE cartId = $userid
            )";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    public function DuplicateCart($userid)
    {
        $db = new connect();
        $select = "SELECT * FROM cart";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['userId'];
            if ($userid == $nw) {
                return true;
            }
        }
    }


    function existTable($userid)
    {
        $db = new connect();
        $select = "SELECT count(cart.cartId) FROM cart, cartdetail
        WHERE cart.cartId = cartdetail.cartId
        AND cart.userId = $userid";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            return $row['count(cart.cartId)'];
        }
    }
    function deleteCart($userid)
    {
        $db = new connect();
        $sql = "DELETE FROM cart WHERE cart.userId = $userid";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function getInfoUserCartAll($userid, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM cart , cartdetail, user WHERE cart.cartId = cartdetail.cartId AND cart.userId = user.userid  AND cart.userId = $userid";
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

    function updateCartQty($detailorderId, $cartQty)
    {
        $db = new connect();
        $select = "UPDATE cartdetail SET soluong = $cartQty  WHERE cartDetailId   = $detailorderId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function updateCartTotal($userId, $total)
    {
        $db = new connect();
        $select = "UPDATE cart SET total = total + $total  WHERE userId  = $userId";
        $result = $db->pdo_execute($select);
        return $result;
    }

    public function DuplicateCartPro($productId, $userid)
    {
        $db = new connect();
        $select = "SELECT * FROM cartdetail ,cart 
        WHERE cart.cartId = cartdetail.cartId 
        AND cart.userid = $userid
        ";
        $result = $db->pdo_query($select);
        foreach ($result as $row) {
            $nw = $row['sachma'];
            if ($productId == $nw) {
                return true;
            }
        }
    }
    // function updateCartQtyDup($sachma, $cartQty)
    // {
    //     $db = new connect();
    //     $select = "UPDATE cartDetail SET soluong = soluong + $cartQtyWHERE cartDetail.sachma = $sachma
    //     ";
    //     $result = $db->pdo_execute($select);
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
    // Function order



    function getInfoorder()
    {
        $db = new connect();
        $sql = "SELECT * FROM order";
        $result = $db->pdo_query($sql);
        return $result;
    }

    public function DuplicateColumn($productid)
    {
        $db = new connect();
        $select = "SELECT * FROM order";
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
        $sql = "SELECT * FROM order cmt , detailorders dt WHERE dt.cmtId = cmt.cmtId AND sachma = '$productId'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }
    function getInfoUserCmt($productId)
    {
        $db = new connect();
        $sql = "SELECT cmtId FROM order WHERE sachma = '$productId'";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['cmtId'];
        }
    }

    function update_cmt($detailorderId, $content)
    {
        $db = new connect();
        $select = "UPDATE detailorders SET content = '$content'  WHERE detailorderId  = $detailorderId";
        $result = $db->pdo_execute($select);
        return $result;
    }
    function CountAllCmtDetails()
    {
        $db = new connect();
        $sql = "SELECT COUNT(detailorderId) FROM detailorders";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(detailorderId)'];
        }
    }

    function CountOrder($order_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) FROM `order`, order_detail WHERE
        `order`.order_id = order_detail.order_id
    AND
    `order_detail`.order_id = $order_id";
        $result   = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(*)'];
        }
    }
    function Count_Order_Detail($product_id)
    {
        $db = new connect();
        $sql = "SELECT COUNT(*) FROM `products`, order_detail WHERE
        `products`.product_id = order_detail.product_id
    AND
    `order_detail`.product_id = $product_id";
        $result   = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['COUNT(*)'];
        }
    }
    function Show_Order()
    {
        $db = new connect();
        $sql = "SELECT * FROM user INNER JOIN `order` WHERE user.user_id=`order`.user_id
        ";
        $result   = $db->pdo_query($sql);
        return $result;
    }
    function Show_Order_Detail($order_id)
    {
        $db = new connect();
        $sql = "SELECT * FROM order_detail, products, `order`, user
        WHERE order_detail.order_id = `order`.order_id AND
        products.product_id = `order_detail`.product_id AND
        user.user_id = `order`.user_id AND 
        order_detail.order_id = $order_id";
        $result = $db->pdo_query($sql);
        return $result;
    }
    function LastestOrder($orderID)
    {
        $db = new connect();
        $sql = "SELECT MIN(order_detail.order_date) AS 'lasted' FROM order_detail
        WHERE order_detail.order_id = $orderID
        ";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row['lasted'];
        }
    }
}
?>