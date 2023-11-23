<?
include('User/component/header.php');
?>

<?

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
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
                        <? echo $order->getInfoOrderId($order_id, 'user_street') ?> -
                        <? echo $order->getLocationOrderId($order_id, 'xa') ?> -
                        <? echo $order->getLocationOrderId($order_id, 'huyen') ?> -
                        <? echo $order->getLocationOrderId($order_id, 'thanhpho') ?>
                    </p>

                    <label class="base-label margin-20">Số điện thoại</label>
                    <p class="margin-0"><? echo $order->getInfoOrderId($order_id, 'user_phone_number') ?></p>
                    <div class="hr"></div>

                    <h3 class="">Thông tin sản phẩm</h3>
                    <table id="checkout-table">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng cộng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dòng 1: Sản phẩm 1 -->
                            <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM order_detail, products, `order`, user
                                    WHERE order_detail.order_id = `order`.order_id AND
                                    products.product_id = `order_detail`.product_id AND
                                    user.user_id = `order`.user_id 
                                    AND order_detail.order_status_id  = 4
                                    AND 
                                    order_detail.order_id = $order_id");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {
                                            echo '
                                            <tr>
                                 <td>'.$row['product_name'].'</td>
                                 <td>'.number_format($row['product_price']).' đ</td>
                                 <td>'.$row['order_quantity'].'</td>
                                 <td>'.number_format($row['product_price'] * $row['order_quantity']).' đ</td>
                               </tr>
                                            ';
                                        }}
                                            ?>
                                 
                             

                            <!-- Dòng 2: Sản phẩm 2 -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Tổng cộng</td>
                                <td><?echo number_format($order->getOrder_total_payment(($order->getInfoOrderId($order_id, 'user_id')), 'order_total_payment'))?> đ</td>
                            </tr>
                        </tfoot>
                    </table>



                    <div class="hr"></div>

                    <h3>Phương thức thanh toán</h3>

                    <div class="three-column margin-20">
                        <div>
                            <label class="base-label">Card</label>
                            XXXX-XXXX-XXXX-1234
                        </div>
                        <div>
                            <label class="base-label">Expiration</label>
                            01/23
                        </div>
                        <div class="mc"><label class="base-label">Card Type</label>
                            <img src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_circles_92px_2x.png">
                        </div>
                    </div>

                    <a class="btn btn-primary" style="display: block ; margin: 20px auto; width: 200px; padding: 15px 25px;" href="index.php?pages=user&action=home">Về Trang Lịch Sử</a>
                </div>
            </div>
        </div>

    </main>
</div>
<?
  if(isset($_POST['payment'])){
    $order->editStatusOrder(1, $order_id);
}
?>
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