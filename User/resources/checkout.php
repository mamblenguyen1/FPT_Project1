<?
include('User/component/header.php');
?>

<?
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $order_id = $_GET['order_id'];
}
?>
<div class="row" style="width: 100%; padding-left:20%; padding-right:10%; padding-top: 20%">
    <div class="col-md-6 order-md-1" style="width:65%">
        <h4 class="mb-3"><b>Địa chỉ nhận hàng</b></h4>
        <form class="needs-validation" action="index.php?pages=user&action=thanks&order_id=<?= $order->getOrder_total_payment($user_id, 'order_id') ?>" method="post">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="firstName">Họ và tên</label>
                    <input type="text" class="form-control rounded-2xl" id="firstName" placeholder="" value="<?= $order->getInfoUserOrder($user_id, 'user_name') ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control rounded-2xl" id="email" placeholder="" value="<?= $order->getInfoUserOrder($user_id, 'email') ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="text" class="form-control rounded-2xl" id="phonenumber" name="phonenumber" placeholder="" value="<?= $order->getInfoUserOrder($user_id, 'user_phone_number') ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="Province">TỈnh thành</label>
                    <select class="form-select d-block w-100 rounded-2xl" name="Province" id="Province" required>
                        <option selected value="0">Chọn tỉnh / thành phố</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="district">Quận, huyện</label>
                    <select class="form-select d-block w-100 rounded-2xl" name="district" id="district" required>
                        <option selected value="0">Chọn Quận / huyện</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="wards">Xã , phường</label>
                    <select class="form-select d-block w-100 rounded-2xl" name="wards" id="wards" required>
                        <option selected value="0">Chọn Xã, Phường</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="streets">Đường</label>
                    <input type="text" class="form-control rounded-2xl" name="user_street" id="user_street" placeholder="" value="<?= $order->getInfoUserOrder($user_id, 'user_street') ?>" required>
                </div>
            </div>
            <hr class="mb-4">
            <h4 class="mb-3"><b>Phương thức thanh toán</b></h4>
            <div class="d-block my-3">
                <ul class="list-group mb-3">
                    <li class="list-group-item border-0 d-flex justify-content-between lh-condensed custom-radio">
                        <div>
                            <input id="momo" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <img src="../../images/momo.png" alt="Visa" />
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between lh-condensed custom-radio">
                        <div>
                            <input id="momo" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <img src="../../images/visa.png" />
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between lh-condensed custom-radio">
                        <div>
                            <input id="momo" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <img src="../../images/paypal.png" />
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between lh-condensed custom-radio">
                        <div>
                            <input id="momo" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <span class="text-muted">Thanh toán khi nhận hàng</span>
                        </div>
                    </li>
                </ul>
                <li class="list-group-item border-0 d-flex justify-content-between">
        <input  type="hidden" name="order_id" value="<?= $order->getOrder_total_payment($user_id, 'order_id') ?>">
        <button name="payment" class="btn bg-slate-900 text-slate-50 btn-block confirm-oder rounded-full" type="submit" style="color: var(--primary-color); font-size:15px;margin-left:70%;margin-bottom:100px; width:75%;height:40px;font-size:18px;font-weight:bold; background-color: var(--secondary-color);">Thanh Toán</button>
    </form>
</li>
    </div>

</div>
<?
if (isset($_COOKIE['userID'])) {
    $conn = $db->pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM order_detail, products, `order`, user
									WHERE order_detail.order_id = `order`.order_id AND
									products.product_id = `order_detail`.product_id AND
									user.user_id = `order`.user_id 
                                    AND order_detail.order_status_id  = 1
                                    AND 
									`order`.user_id = $user_id");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '
                                        <div class="col-md-6 order-md-2 mb-4" style="width:35%">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><b>Thông tin</b></span>
        </h4>
                                        ';
        $cost = 0;
        $firstPrice = 0;
        foreach ($stmt as $row) {
            echo '
    
        <div class="flex relative py-7">
            <div class="">
                <img height="50px" src="images/product/' . $row['product_img'] . '.png" class="image-checkout h-full w-full object-contain object-center" style="width: 60px;height: 80px;">
            </div>
            <div class="product ml-3 sm:ml-6 flex flex-1 flex-col" >
                <div class="flex justify-between">
                    <div class="info">
                        <p style="font-size: 15px">' . $row['product_name'] . '<strong> X ' . $row['order_quantity'] . '</strong></p>
                        <div class="pricee  ">
                            <h3  class="price1" style=" font-size: 17px ;color:red ; text-transform : none">' . number_format($row['order_quantity'] * $product->sale($row['product_price'],$row['product_sale'])) . ' đ</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
';
            $firstPrice = $row['order_quantity'] * $product->sale($row['product_price'],$row['product_sale']);
            $cost = $cost + $firstPrice;
        }
    }
}
?>
<?
$Percentage = 0;
if (isset($_POST['code-input'])) {
    $result = $code->checkCode($_POST['code']);
    if ($result == true) {
        $result = $code->checkExpires($_POST['code']);
        if ($result == true) {
            if (($order->getOrder_total_payment($user_id, 'order_total_payment')) < intval($code->getInfoCode($_POST['code'], 'code_condition'))) {
                echo '<span style="color:red" class="vaild">Bạn không đủ điều kiện sử dụng mã giảm giá, tổng giá trị đơn hàng phải > '.number_format(intval($code->getInfoCode($_POST['code'], 'code_condition'))).' đ để sử dụng mã này</span>';
            } else {
                echo '<span style="color:green" class="vaild">Áp dụng mã giảm giá <b>' . $_POST['code'] . '</b> thành công !</span>';
                $sql = $code->getCode($_POST['code']);
                extract($sql);
                $discount = $Percentage / 100;
                $finalprice = (($order->getOrder_total_payment($user_id, 'order_total_payment') - ($order->getOrder_total_payment($user_id, 'order_total_payment')) * $discount));
                $order->updateCartTotal($_COOKIE['userID'], $finalprice);
            }
        } else {
            echo '<span style="color:red" class="vaild">Mã giảm giá đã hết hạn sử dụng !</span>';
        }
    } else {
        echo '<span style="color:red" class="vaild">Mã giảm giá không tồn tại !</span>';
    }
}
?>
<h4 class="d-flex justify-content-between align-items-center mb-3">
    <form method="post" class="color-white">
        <label for="firstName">Mã giảm giá (Nếu Có)</label>
        <input value="" name="code" type="text" class="form-control" style="width:200px;" placeholder="Nhập mã giảm giá">
        <button type="submit" name="code-input" class="tg-btn" style="width:100px; padding:0;">Nhập</button>
        <h3><label><b>Thành tiền</b></label></h3>
        <ul class="list-group mb-3"></ul>
        <li class="list-group-item border-0 d-flex justify-content-between lh-condensed">
            <a class="text-muted"><b>Giá gốc:</b> </a>
            <a class="text-muted1"><?= number_format($cost) ?> đ</a>
        </li>
        <li class="list-group-item border-0 d-flex justify-content-between lh-condensed">
            <a class="text-muted"><b>Giảm giá:</b></a>
            <a class="text-muted1"></a><?= $Percentage ?> %</a>
            <?
            $discount = $Percentage / 100;
            ?>
        </li>
        <!-- <li class="list-group-item border-0 d-flex justify-content-between lh-condensed">
                <a class="text-muted"><b>Số lượng:</b> </a>
                <a class="text-muted1">$5</a>
            </li> -->
        <li class="list-group-item border-0 d-flex justify-content-between">
            <h3><b>Tổng: <a><?=number_format( round($order->getOrder_total_payment($user_id, 'order_total_payment'))) ?> đ</a></b></h3>
            <!-- <input type="hidden" name="priceFinal" value="<?= round((($order->getOrder_total_payment($user_id, 'order_total_payment') - ($order->getOrder_total_payment($user_id, 'order_total_payment')) * $discount))) ?>" id=""> -->
        </li>
    </form>


</h4>



</ul>
</div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "./admin/resources/address/province.php",
            dataType: 'json',
            success: function(data) {
                $("#Province").html("");
                for (i = 0; i < data.length; i++) {
                    var Province = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                    var str = ` 
                <option value="${Province['province_id']}"> ${Province['name']} </option>
                   `;
                    $("#Province").append(str);
                }
                $("#Province").on("change", function(e) {
                    layHuyen();
                });
            }
        });
    })
</script>
<script>
    function layHuyen() {
        var province_id = $("#Province").val();
        $.ajax({
            url: "./admin/resources/address/district.php?province_id=" + province_id,
            dataType: 'json',
            success: function(data) {
                $("#district").html("");
                for (i = 0; i < data.length; i++) {
                    var district = data[i];
                    var str = ` 
                <option  value="${district['district_id']}">${district['name']} </option>`;
                    $("#district").append(str);
                }
                $("#district").on("change", function(e) {
                    layXa();
                });
            }
        });
    }
</script>
<script>
    function layXa() {
        var district_id = $("#district").val();
        $.ajax({
            url: "./admin/resources/address/wards.php?district_id=" + district_id,
            dataType: 'json',
            success: function(data) {
                $("#wards").html("");
                for (i = 0; i < data.length; i++) {
                    var wards = data[i];
                    var str = ` 
                <option  value="${wards['wards_id']}">${wards['name']} </option>`;
                    $("#wards").append(str);
                }
            }
        });
    }
</script>
<style>
    .color-white li{
        background: var(--primary-color);
    }
    .color-white li a{
        color: var(--secondary-color-color);
    }
    .color-white li .text-muted1{
        color: var(--secondary-color);
    }
    .info p{
        color: var(--secondary-color);
    }
    .my-3 li{
        background: var(--primary-color);
    }
    h4 b{
        color: var(--secondary-color);
    }
    label{
        color: var(--secondary-color);
    }
    img {
        width: 100px;
        height: 50px;
        margin-left: 3%;
    }

    select {
        width: 100%;
    }

    p a {
        text-decoration: none;
    }

    p a:hover {
        text-decoration: none;
    }

    .text-muted {
        text-align: left;
    }

    .text-muted1 {
        text-align: right;
    }

    .mb-3 {
        padding-bottom: 2%
    }

    .border-0 {
        border: none !important;
    }

    .rounded-2xl {
        border-radius: 1rem !important;
    }

    .ml-3 {
        margin-left: .75rem;
    }

    .product {
        display: block;
    }

    .mt-1\.5 {
        margin-top: .375rem;
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .confirm-oder {
        color: white;
        background: var(--secondary-color);;
        font-size: 1rem;
        line-height: 1.5rem;
        width: 100%;
        padding-bottom: .875rem;
        padding-top: .875rem;
        font-weight: 500;
        justify-content: center;
        border: 0 solid #e5e7eb;
        box-sizing: border-box;
    }

    .rounded-full {
        border-radius: 9999px !important;
    }

    .mr-075 {
        margin-right: 0.75rem;
    }

    .flex {
        display: flex;
    }

    .relative {
        position: relative;
    }

    .py-7 {
        padding-bottom: 1.75rem;
        padding-top: 1.75rem;
    }

    .flex-col {
        flex-direction: column;
    }

    .flex-1 {
        flex: 1 1;
    }

    .ml-3 {
        margin-left: 0.75rem;
    }

    .sm\:ml-6 {
        margin-left: 1.5rem;
    }

    .image-checkout {
        width: 7.5rem;
        border-radius: 10%;
    }

    .justify-between {
        justify-content: space-between;
    }

    .items-end {
        align-items: end;
    }

    .pt-4 {
        padding-top: 1rem;
    }

    .mt-auto {
        margin-top: auto;
    }

    .border-l {
        border-left-width: 1px;
    }

    /* tăng số lượng */
    .content {
        /* 	background-color: #fff;
	border: 1px solid #ccc;
	border-style: none none solid none; */
        float: left;
    }

    .price {
        padding-left: .625rem;
        padding-right: .625rem;
        padding-bottom: .375rem;
        padding-top: .375rem;
        text-align: center;
        font-size: 0.875rem;
        width: 70px;
        border-radius: .5rem;
        border: 2px solid rgb(34 197 94);
        color: rgb(34 197 94);
    }

    .full-price {
        display: none;
        background: #53b5aa;
        color: #fff;
        float: right;
        font-size: 22px;
        font-weight: 300;
        line-height: 49px;
        margin: 0;
        padding: 0 30px;

        -webkit-transition: margin .15s linear;
        -moz-transition: margin .15s linear;
        -ms-transition: margin .15s linear;
        -o-transition: margin .15s linear;
        transition: margin .15s linear;
    }

    .qt,
    .qt-plus,
    .qt-minus {
        display: block;
        float: left;
    }

    .qt {
        font-size: 18px;
        line-height: 35px;
        width: 70px;
        text-align: center;
    }

    .qt-plus,
    .qt-minus {
        text-align: center;
        width: 35px;
        border-radius: 50%;
        background: #fcfcfc;
        border: 1px solid grey;
        font-size: 18px;
        font-weight: 300;
        height: 100%;
        padding: 0 10px;
    }

    .qt-plus:hover,
    .qt-minus:hover {
        cursor: pointer;
    }

    .qt-plus {
        line-height: 35px;
    }

    .qt-minus {
        line-height: 35px;
    }
</style>
<?
include('user/component/footer.php');
?>