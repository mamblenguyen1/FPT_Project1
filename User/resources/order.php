<?
include('User/component/header.php');
?>
<div class="tg-sectionspace tg-haslayout" style="padding: 20px;">
    <?
        if(isset($_POST['cancel'])){
            $cart_id = $_POST['cart_id'];
            $order->editStatusCartAd(4, $cart_id);
            echo '<script>window.location.href="index.php?pages=user&action=order"</script>';
        
        }
    ?>
    <?
    $conn = $db->pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM cart, order_status WHERE order_status.order_status_id= cart.status AND cart.status NOT IN (3 ,4) AND cart.user_id = $_COOKIE[userID]");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt as $row) {
        
    ?>
    <h3 style="text-align: center; font-size: 30px;">Đơn hàng của bạn</h3>
            <div class="container">
                <div class="order-list">
                    <div class="order">
                        <div class="head">
                            <h4 class="name">Mã đơn hàng #<?= $row['cart_id'] ?></h4>
                            <div class="status">
                                <h4>Trạng thái: <?= $row['order_status'] ?></h4>
                            </div>
                        </div>
                        <?
                        $finalPrice = 0;
                        $conn = $db->pdo_get_connection();
                        $stmt = $conn->prepare("SELECT * FROM cart_detail, products ,cart
                WHERE cart_detail.product_id = products.product_id
                AND cart.cart_id = cart_detail.cart_id
                AND cart_detail.cart_id = $row[cart_id]");
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt as $row) {
                                echo ' 
                        <div class="detail">
                            <img src="images/product/' . $row['product_img'] . '.png" class="img-responsive" style="width: 100px;height: 100px;" />
                            <div class="info">
                                <h5 class="nomargin">' . $row['product_name'] . '</h5>
                                <p>Số lượng: ' . $row['quantity'] . '</p>
                            </div>
                            <div class="price">
                                <span style="font-size: 14px; font-weight:bold">' . number_format($row['quantity'] * $row['product_price']) . 'đ</span>
                            </div>

                        </div>
                        ';
                                $tong = $row['quantity'] * $row['product_price'];
                                $finalPrice = $finalPrice + $tong;
                            }
                        }
                        ?>
                        <div class="total">
                            <div class="action" style="padding: 30px;">
                                <?
                                if ($row['status'] == 1) {
                                    echo '
                                    <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="'.$row['cart_id'].'">
                                    <button type="submit" name="cancel" class="btn btn-danger">Huỷ đơn hàng</button>
                                </form>
                            ';
                                } else {
                                    echo '';
                                }
                                ?>
                            </div>
                            
                            <div class="prices">
                                <p>Tổng tiền :   <span style="font-size: 19px; color: gray;"><?= number_format($finalPrice)?> đ</span></p>
                                <p>Giảm giá : 
                            <?
                             echo   (100 - intval($row['total_price'] *100 / $finalPrice));
                            ?>  %
                                </p>
                                <span>
                                    Thành tiền:
                                    <h7>
                                        <?= number_format($row['total_price']) ?> đ
                                    </h7>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    <? }
    } ?>
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