<?
include('User/component/header.php');
?>
<div class="tg-sectionspace tg-haslayout">
    <?
    if ($order->CountOrderWait(1, $_COOKIE['userID']) > 0) {
    ?>
        <div class="container">
            <h3>Danh sách đơn hàng chưa giao</h3>
            <div class="order-list">
                <div class="order">
                    <div class="head">
                        <h4 class="name">Đơn hàng #1</h4>
                        <div class="status">
                            <h4>Trạng thái: Chưa giao</h4>
                        </div>
                    </div>
                    <?
                    $finalPrice = 0;
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * FROM order_detail, products, `order`, user
                     WHERE order_detail.order_id = `order`.order_id AND
                     products.product_id = `order_detail`.product_id AND
                     user.user_id = `order`.user_id  
                     AND order_detail.order_status_id = 1
                     AND order.user_id = $_COOKIE[userID]");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {
                            echo ' 
                        <div class="detail">
                            <img src="images/product/' . $row['product_img'] . '.png" class="img-responsive" style="width: 100px;height: 100px;" />
                            <div class="info">
                                <h5 class="nomargin">' . $row['product_name'] . '</h5>
                                <p>Số lượng: ' . $row['order_quantity'] . '</p>
                            </div>
                            <div class="price">
                                <span>Giá: ' . number_format($row['order_quantity'] * $row['product_price']) . 'sđ</span>
                            </div>

                        </div>
                        <div style="margin: 10px 0; padding: 5px 20px;">
                            <span>Trạng thái: ' . $order->getOrderStatusDetail($row['order_detail_id'], 'order_status') . '</span>
                        </div>
                        ';
                            $tong = $row['order_quantity'] * $row['product_price'];
                            $finalPrice = $finalPrice + $tong;
                        }
                    }
                    ?>
                    <div class="total">
                        <div class="action">
                            <button type="button" class="btn btn-danger">Huỷ đơn hàng</button>
                        </div>
                        <div class="prices">
                            <span>
                                Thành tiền:
                                <h7>
                                    <?= number_format($finalPrice) ?> đ
                                </h7>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?



    }else{
        echo '';
    }
    ?>
  <?
    if ($order->CountOrderWait(2, $_COOKIE['userID']) > 0) {
    ?>
    <div class="container">
        <h3>Danh sách đơn hàng đang giao</h3>
        <div class="order-list">
            <div class="order">
                <div class="head">
                    <h4 class="name">Đơn hàng #1</h4>
                    <div class="status">
                        <h4>Trạng thái: đang giao</h4>
                    </div>
                </div>
                <?
                $finalPrice = 0;
                $conn = $db->pdo_get_connection();
                $stmt = $conn->prepare("SELECT * FROM order_detail, products, `order`, user
                     WHERE order_detail.order_id = `order`.order_id AND
                     products.product_id = `order_detail`.product_id AND
                     user.user_id = `order`.user_id  
                     AND order_detail.order_status_id = 2
                     AND order.user_id = $_COOKIE[userID]");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    foreach ($stmt as $row) {
                        echo ' 
                        <div class="detail">
                            <img src="images/product/' . $row['product_img'] . '.png" class="img-responsive" style="width: 100px;height: 100px;" />
                            <div class="info">
                                <h5 class="nomargin">' . $row['product_name'] . '</h5>
                                <p>Số lượng: ' . $row['order_quantity'] . '</p>
                            </div>
                            <div class="price">
                                <span>Giá: ' . number_format($row['order_quantity'] * $row['product_price']) . 'sđ</span>
                            </div>

                        </div>
                        <div style="margin: 10px 0; padding: 5px 20px;">
                            <span>Trạng thái: ' . $order->getOrderStatusDetail($row['order_detail_id'], 'order_status') . '</span>
                        </div>
                        ';
                        $tong = $row['order_quantity'] * $row['product_price'];
                        $finalPrice = $finalPrice + $tong;
                    }
                }
                ?>
                <div class="total">
                    <div class="action">
                        <button type="button" class="btn btn-danger">Huỷ đơn hàng</button>
                    </div>
                    <div class="prices">
                        <span>
                            Thành tiền:
                            <h7>
                                <?= number_format($finalPrice) ?> đ
                            </h7>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <? }?>
</div>
</div>
<style>
    h7 {
        color: red;
        font-weight: bold;
        font-size: 20px;
    }

    h1 {
        text-align: center;
    }

    .order-list {
        margin-top: 20px;
    }

    .name {
        width: 80%;
    }

    .status {
        width: 20%;
    }

    .price {
        color: red;
    }

    .head {
        display: flex;
        margin: 10px;
        align-items: center;

    }

    .detail {
        display: flex;
        margin: 10px;
        align-items: center;

    }

    .info {
        margin: 10px;
        width: 80%;
    }

    .order {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .order h4 {
        background-color: #333;
        color: #fff;
        padding: 10px;
    }

    h6 {
        background-color: #3b3b3b;
        color: white;
        padding: 10px;
    }

    .total {
        display: flex;
    }

    .action {
        width: 90%;
    }

    .prices {
        width: 20%;
    }

    .order-info {
        margin-top: 20px;
    }

    .order-info p {
        margin: 0;
        padding: 5px 0;
    }
</style>
<?
include('user/component/footer.php');
?>