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
    function updateCartQty($order_detail_id , $cartQty)
    {
        $db = new connect();
        $select = "UPDATE `order_detail` SET order_quantity = $cartQty  WHERE order_detail_id = $order_detail_id ";
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
    function deleteCartDetailAd($productID)
    {
        $db = new connect();
        $sql = "DELETE FROM order_detail WHERE order_detail.order_detail_id  = $productID";
        $result = $db->pdo_execute($sql);
        return $result;
    }
    function updateCartTotal($userId, $total)
    {
        $db = new connect();
        $select = "UPDATE `order` SET order_total_payment =  $total  WHERE user_id  = $userId";
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

    function getOrderStatus($order_id, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `order_status` , `order` WHERE `order`.order_status_id = order_status.order_status_id AND `order`.order_id = $order_id";
        $result = $db->pdo_query($sql);
        foreach ($result as $row) {
            return $row[$column];
        }
    }

    function editStatusOrder($order_status_id, $order_id)
    {
        $db = new connect();
        $select = "UPDATE `order` SET order_status_id = $order_status_id  WHERE order_id  = $order_id";
        $result = $db->pdo_execute($select);
        return $result;
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
    function getOrder_total_payment($userid, $column)
    {
        $db = new connect();
        $sql = "SELECT * FROM `order` 
        WHERE user_id  = $userid";
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

 //   function updateCartQty($detailorderId, $cartQty)
   // {
  //      $db = new connect();
  //      $select = "UPDATE cartdetail SET soluong = $cartQty  WHERE cartDetailId   = $detailorderId";
   //     $result = $db->pdo_execute($select);
  //      return $result;
  //  }
   // function updateCartTotal($userId, $total)
   // {
    //    $db = new connect();
  //      $select = "UPDATE cart SET total = total + $total  WHERE userId  = $userId";
   //     $result = $db->pdo_execute($select);
   //     return $result;
  //  }



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

    function OrderInformation($user_id)
    {
        $db = new connect();
        $sql = "SELECT * FROM order_detail, products, `order`, user
        WHERE order_detail.order_id = `order`.order_id AND
        products.product_id = `order_detail`.product_id AND
        user.user_id = `order`.user_id AND 
        order.user_id = $user_id";
        $result = $db->pdo_query($sql);
        return $result;
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
    function Show_Order_Detail_user($user_id)
    {
        $db = new connect();
        $sql = "SELECT * FROM order_detail, products, `order`, user
        WHERE order_detail.order_id = `order`.order_id AND
        products.product_id = `order_detail`.product_id AND
        user.user_id = `order`.user_id AND 
        `order`.user_id = $user_id";
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