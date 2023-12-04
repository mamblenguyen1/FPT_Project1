<?
include('User/component/header.php');
?>
<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4" style="color: var(--primary-color);">
        .
    </h4>
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action " href="index.php?pages=user&action=informationuser">Thông tin tài khoản</a>
                    <a class="list-group-item list-group-item-action " href="index.php?pages=user&action=updateuser">Cập nhật tài khoản</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=changepassword">Đổi mật khẩu</a>
                    <a class="list-group-item list-group-item-action active " href="index.php?pages=user&action=history">Lịch sử đơn hàng</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <h3 style="color: var(--secondary-color);">Lịch sử đơn hàng</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <!-- /.card-header -->
                                    <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM cart, order_status WHERE order_status.order_status_id= cart.status AND cart.status = 3 AND cart.user_id = $_COOKIE[userID]");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {
                                    ?>
                                            <div class="history">
                                                <h3 class="title">
                                                    Mã đơn hàng #<?= $row['cart_id'] ?>
                                                </h3>
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
                                                ?>
                                                        <div class="product-ordered">
                                                            <div class="productimg">
                                                                <div class="imgp">
                                                                    <img src="images/product/<?= $row['product_img'] ?>.png">
                                                                </div>
                                                                <div class="name"><span><?= $row['product_name'] ?></span></div>
                                                            </div>
                                                            <div class="productinfo">
                                                                <div class="quantity">Số lượng : <?= $row['quantity'] ?></div>
                                                                <div class="price"> Giá : <?= number_format($row['quantity'] * $row['product_price']) ?></div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <?
                                                        $tong = $row['quantity'] * $row['product_price'];
                                                        $finalPrice = $finalPrice + $tong;
                                                        ?>
                                                    <? }
                                                    ?>
                                                    <div class="cost">
                                                        <p class="costprice">Tổng cộng : <?= number_format($finalPrice) ?> đ</p>
                                                        <p class="per">Giảm giá : <? echo (100 - intval($row['total_price'] * 100 / $finalPrice)); ?> %</p>
                                                        <p class="finalprice"> Thành tiền : <?= number_format($row['total_price']) ?></p>
                                                    </div>
                                                <?
                                                }
                                                ?>
                                            </div>
                                            <br><br>
                                    <? }
                                    } else {
                                        echo 'Bạn chưa đặt đơn hàng nào.';
                                        echo '<a style="color:red" href="index.php?pages=user&action=cart">Đến giỏ hàng</a>
                                            <a style="color:blue" href="index.php?pages=user&action=products">Xem thêm sản phẩm</a>';
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?
include('user/component/footer.php');
?>
<style>
    .pt-0 {
        border: 1px solid white;
    }

    .account-settings-links a {
        background: var(--primary-color);
        border: 1px solid white;
    }

    .history {
        border: 2px solid gray;
        box-shadow: 0 3px 5px gray;
        padding: 5px;
        color: var(--secondary-color);
    }

    .history h3 {
        color: var(--secondary-color);
    }

    .product-ordered {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 5px 0;
    }

    .productimg {
        display: flex;
    }

    .history img {
        width: 100px;
        height: 120px;
    }

    .productimg .imgp {
        margin-right: 30px;
    }

    .productimg .name {
        margin-left: 30px;

    }

    .productimg .name span {
        font-weight: bold;
        font-size: 16px;
    }

    .productinfo {
        margin: 0 20px;
    }

    .productinfo .quantity {
        margin: 20px 0;
        font-size: 16px;
    }

    .productinfo .price {
        margin: 20px 0;
        font-size: 16px;
        color: red;
    }

    .cost .costprice {
        color: gray;
        font-size: 17px;
        font-weight: bolder;
        color: var(--secondary-color);
    }

    .cost .per {
        color: green;
        font-size: 16px;
        font-weight: bolder;
    }

    .cost .finalprice {
        color: red;
        font-size: 17px;
        font-weight: bolder;
    }



    .ui-w-80 {
        width: 80px !important;
        height: auto;
    }

    .btn-default {
        border-color: rgba(24, 28, 33, 0.1);
        background: rgba(0, 0, 0, 0);
        color: #4E5155;
    }

    label.btn {
        margin-bottom: 0;
    }

    .btn-outline-primary {
        border-color: #26B4FF;
        background: transparent;
        color: #26B4FF;
    }

    .btn {
        cursor: pointer;
    }

    .text-light {
        color: #babbbc !important;
    }

    .btn-facebook {
        border-color: rgba(0, 0, 0, 0);
        background: #3B5998;
        color: #fff;
    }

    .btn-instagram {
        border-color: rgba(0, 0, 0, 0);
        background: #000;
        color: #fff;
    }

    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
    }

    .row-bordered {
        overflow: hidden;
    }

    .account-settings-fileinput {
        position: absolute;
        visibility: hidden;
        width: 1px;
        height: 1px;
        opacity: 0;
    }

    .account-settings-links .list-group-item.active {
        font-weight: bold !important;
    }

    html:not(.dark-style) .account-settings-links .list-group-item.active {
        background: transparent !important;
    }

    .account-settings-multiselect~.select2-container {
        width: 100% !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: var(--secondary-color);
    }

    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .material-style .account-settings-links .list-group-item.active {
        color: var(--secondary-color);
    }

    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }

    .dark-style .account-settings-links .list-group-item.active {
        color: var(--secondary-color);
    }

    .light-style .account-settings-links .list-group-item.active {
        color: var(--secondary-color);
    }

    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
</style>