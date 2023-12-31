<?
include('User/component/header.php');
?>
<?
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    if (isset($_POST['payment'])) {
        $province_id = $_POST['Province'];
        $district_id  = $_POST['district'];
        $wards_id  = $_POST['wards'];
        $user_street = $_POST['user_street'];
        $discount = isset($_SESSION['discount']) ? $_SESSION['discount'] : 0;
        $phone_number = $_POST['phonenumber'];
        $province_name = $user->getAddress('province', $province_id, 'name');
        $district_name = $user->getAddress('district', $district_id, 'name');
        $wards_name = $user->getAddress('wards', $wards_id, 'name');
        $address = "$user_street  - $wards_name - $district_name - $province_name";
        $totalprice = $order->getOrder_total_payment($_COOKIE['userID'], 'order_total_payment');
        $order->addCartAndCartDetail($_COOKIE['userID'], $address, $totalprice, $order_id);
        $cart_now = $order->Show_Cart_detail_Collumn1($_COOKIE['userID'], 'cart_id');
        $customMail =  $order->getInfoUserByCartID($cart_now, 'email');
        $mail->MailOrder($cart_now, $order_id, $customMail);
    }
}
?>
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="tg-sectionspace tg-haslayout">
            <div class="thanks">
                <div class="title">
                    <img class="logo" src="images/logo.png">
                    <h4 class="">Hóa Đơn</h4>
                </div>
                <div class="hr"></div>
                <div class="heading">
                    <h3 class="margin-bottom-0">Thanh toán thành công</h3>
                    <p>Cảm ơn quý khách đã mua hàng tại website của chúng tôi !!!</p>
                    <div class="hr"></div>
                    <h3>Thông tin khách hàng</h3>
                    <label class="base-label margin-20">Tên</label>
                    <p class="margin-0"><? echo $order->getInfoOrderId($order_id, 'user_name') ?></p>
                    <label class="base-label margin-20">Địa chỉ email</label>
                    <p class="margin-0"><? echo $order->getInfoOrderId($order_id, 'email') ?></p>
                    <label class="base-label margin-20">Địa chỉ giao hàng</label>
                    <p class="margin-0">
                        <? echo $address ?>
                    </p>
                    <label class="base-label margin-20">Số điện thoại</label>
                    <p class="margin-0"><? echo $phone_number ?></p>
                    <div class="hr"></div>
                    <h3 class="">Thông tin sản phẩm</h3>
                    <table id="checkout-table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá Gốc</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dòng 1: Sản phẩm 1 -->
                            <?
                            $sql = $order->Show_Order();
                            foreach ($sql as $row) {
                                extract($sql);
                            }
                            ?>
                            <?
                            $tong = 0;
                            $conn = $db->pdo_get_connection();
                            $stmt = $conn->prepare("SELECT * FROM order_detail, products, `order`, user
                                    WHERE order_detail.order_id = `order`.order_id AND
                                    products.product_id = `order_detail`.product_id AND
                                    user.user_id = `order`.user_id 
                                    AND order_detail.order_status_id  = 1
                                    AND 
                                    order_detail.order_id = $order_id");
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                foreach ($stmt as $row) {
                                    echo '
                                        <tr>
                                            <td>' . $row['product_name'] . '</td>
                                            <td>' . number_format($product->sale($row['product_price'], $row['product_sale'])) . ' đ</td>
                                            <td>' . $row['order_quantity'] . '</td>
                                            <td>' . number_format($product->sale($row['product_price'], $row['product_sale']) * $row['order_quantity']) . ' đ</td>
                                        </tr>
                                            ';
                                    $tong = $tong + ($product->sale($row['product_price'], $row['product_sale']) * $row['order_quantity']);
                                }
                            }
                            ?>
                            <!-- Dòng 2: Sản phẩm 2 -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Giá tổng</td>
                                <td><? echo number_format($tong) ?> đ</td>
                            </tr>
                            <tr>
                                <td colspan="3">Phần trăm đã giảm</td>
                                <td><? echo (100 - intval(($order->getOrder_total_payment(($order->getInfoOrderId($order_id, 'user_id')), 'order_total_payment')) * 100 / $tong)) ?> %</td>
                            </tr>
                            <tr>
                                <th colspan="3">Tổng cộng</th>
                                <td><? echo number_format($order->getOrder_total_payment(($order->getInfoOrderId($order_id, 'user_id')), 'order_total_payment')) ?> đ</td>
                            </tr>
                        </tfoot>
                    </table>
                    <?
                    $order->updateOrderDetail($order_id);
                    ?>
                    <div class="hr"></div>
                    <h3>Phương thức thanh toán: COD</h3>
                    <a class="btn btn-primary" style="display: block ; margin: 20px auto; width: 200px; padding: 15px 25px;" href="index.php?pages=user&action=order">Theo dõi đơn hàng</a>
                </div>
            </div>
        </div>

    </main>
</div>
<style>
    .thanks .logo {
        margin-top: 0px;
        width: 200px;
    }

    .thanks .heading {
        margin: auto;
        max-width: 90%;
    }

    .thanks .margin-bottom-0 {
        margin-bottom: 0;
    }

    .thanks .left-20 {
        margin-left: 20px;
    }

    #checkout-table {
        width: 100%;
        border-collapse: collapse;
    }

    #checkout-table th,
    #checkout-table td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    #checkout-table input[type="number"] {
        width: 50px;
    }

    .thanks .hr {
        border-bottom: 2px solid #ddd;
        padding: 10px;
    }

    .thanks .title {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        padding-top: 50px;
    }

    .thanks h4 {
        width: 150px;
        font-size: 30px;
        font-weight: bold;
    }

    .thanks h3 {
        font-size: 25px;
        font-weight: bold;
    }

    .thanks .margin-40 {
        margin-top: 40px;
    }

    .thanks .no-top-pad {
        padding-top: 0;
    }

    .thanks .pad-left {
        padding-left: 80%;
    }

    .thanks .inline {
        display: inline-block;
        width: 48%;
    }

    .thanks .inline-block {
        display: inline-block;
    }

    .thanks ul.leaders {
        max-width: 40em;
        padding: 0;
        margin-top: 0;
        overflow-x: hidden;
        list-style: none
    }

    .thanks ul.leaders li:before {
        float: left;
        width: 0;
        white-space: nowrap;
        content:
            " "
            " "
            ""
            ""
    }

    .thanks ul.leaders span:first-child {
        padding-right: 0.33em;
        background: #fff
    }

    .thanks ul.leaders span+span {
        float: right;
        padding-left: 0.33em;
        background: #fff
    }

    .thanks ul.leaders li {
        margin-top: 12px;
    }

    .thanks {
        font-size: 20px;
        display: block;
        background: #fff;
        border-radius: 2px;
        max-width: 100%;
        width: 50%;
        margin: 0 auto;
        border: 1px solid black;
    }

    .thanks .three-column {
        display: grid;
        grid-template-columns: 3fr .75fr .75fr;
        grid-gap: 20px;
    }

    .thanks .mc {
        float: right;
    }

    .thanks .mc img {
        width: 40px;
    }

    .thanks .base-label {
        color: #4d4d4d;
        cursor: text;
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        text-transform: uppercase;
        -webkit-transition: display .3s ease-out;
        transition: display .3s ease-out;
        font-size: 12px;
    }

    .thanks .grid-container {
        background: #fff;
        display: grid;
        grid-template-columns: 80% 19%;
        grid-template-rows: 48px 48px;
        gap: 1px 1px;
        grid-template-areas: "Label-1 Text-1" "Label-2 Text-2";
    }

    .thanks .Label-1 {
        grid-area: Label-1;
    }

    .thanks .Text-1 {
        grid-area: Text-1;
    }

    .thanks .Label-2 {
        grid-area: Label-2;
    }

    .thanks .Text-2 {
        grid-area: Text-2;
    }

    .thanks .Label-3 {
        grid-area: Label-3;
    }

    .thanks .Text-3 {
        grid-area: Text-3;
    }

    .thanks .label-cell {
        border-top: 2px solid #ddd;
        padding: 12px 0;
    }

    .thanks .label-cell-left {
        padding-top: 18px;
    }

    .thanks .order-details {
        margin-top: 0;
        float: right;
    }

    .thanks .store-badge {
        width: 120px;
    }
</style>
<?
include('user/component/footer.php');
?>