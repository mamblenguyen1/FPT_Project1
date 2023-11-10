<?
include('User/component/header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách đơn hàng</title>
</head>

<body>
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <h3>Danh sách đơn hàng</h3>

            <div class="order-list">
                <div class="order">
                    <div class="head">
                        <h4 class="name">Đơn hàng #1</h4>
                        <div class="status">
                            <h4>Trạng thái: Đang giao</h4>
                        </div>
                    </div>
                    <div class="detail">
                        <img src="http://placehold.it/100x100" alt="..." class="img-responsive" />
                        <div class="info">
                            <h5 class="nomargin">Điện thoại Iphone 15</h5>
                            <p>Số lượng: 1</p>
                        </div>
                        <div class="price">
                            <span>200.000 đ</span>
                        </div>
                    </div>
                    <div class="detail">
                        <img src="http://placehold.it/100x100" alt="..." class="img-responsive" />
                        <div class="info">
                            <h5 class="nomargin">Điện thoại Iphone 15</h5>
                            <p>Số lượng: 1</p>
                        </div>
                        <div class="price">
                            <span>200.000 đ</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="action">
                            <button type="button" class="btn btn-danger">Huỷ đơn hàng</button>
                        </div>
                        <div class="prices">
                            <span>
                                Thành tiền:
                                <h7>
                                    400.000 đ
                                </h7>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="order">
                    <div class="head">
                        <h4 class="name">Đơn hàng #1</h4>
                        <div class="status">
                            <h4>Trạng thái: Đang giao</h4>
                        </div>
                    </div>
                    <div class="detail">
                        <img src="http://placehold.it/100x100" alt="..." class="img-responsive" />
                        <div class="info">
                            <h5 class="nomargin">Điện thoại Iphone 15</h5>
                            <p>Số lượng: 1</p>
                        </div>
                        <div class="price">
                            <span>200.000 đ</span>
                        </div>
                    </div>
                    <div class="detail">
                        <img src="http://placehold.it/100x100" alt="..." class="img-responsive" />
                        <div class="info">
                            <h5 class="nomargin">Điện thoại Iphone 15</h5>
                            <p>Số lượng: 1</p>
                        </div>
                        <div class="price">
                            <span>200.000 đ</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="action">
                            <button type="button" class="btn btn-danger">Huỷ đơn hàng</button>
                        </div>
                        <div class="prices">
                            <span>
                                Thành tiền:
                                <h7>
                                    400.000 đ
                                </h7>
                            </span>
                        </div>
                    </div>
                </div>

                
            </div>
            <!-- Thêm đơn hàng khác tùy theo nhu cầu -->
        </div>
    </div>
    </div>
</body>

</html>
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