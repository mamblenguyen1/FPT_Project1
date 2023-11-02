<?
include('user/component/header.php');
?>

<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="cart.php?action=submit" method="POST">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xoá</th>
                                    <th class="li-product-thumbnail">Ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="li-product-price">Giá</th>
                                    <th class="li-product-quantity">Số lượng</th>
                                    <th class="li-product-subtotal">Tổng cộng</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <tr>
                                            <td class="li-product-remove"><a href=""><i class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail"><a href="#"><img style="height:100px" src="images/iphone.jpg" alt="Image"></a></td>
                                            <td class="li-product-name"><a href="#">
                                                </a></td>
                                            <td class="li-product-price"><span class="amount">
                                                    9999 đ
                                                </span></td>
                                            <td class="quantity">
                                                <label>Số lượng</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>

                                            <td class="product-subtotal"><span class="amount">
                                                    123123
                                                </span> đ</td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Mã giảm giá" type="text">
                                    <input class="button" name="apply_coupon" value="Sử dụng" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Cập nhật" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng cộng giỏ hàng</h2>
                                <ul>
                                    <li>Tổng cộng <span>
                                           22222 đ
                                        </span></li>

                                </ul>
                                <input class="buy_btn" type="submit" name="buy_btn" value="Thanh toán">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?
include('user/component/footer.php');
?>