<?
include('User/component/header.php');
?>
<div class="row" style="width: 100%; padding-left:10%; padding-right:10%; padding-top: 25%">
    <div class="col-md-6 order-md-1">
        <h4 class="mb-3"><b>Địa chỉ nhận hàng</b></h4>
        <form class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Họ</label>
                    <input type="text" class="form-control rounded-2xl" id="firstName" placeholder="" value="" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lastName">Tên</label>
                    <input type="text" class="form-control rounded-2xl" id="lastName" placeholder="" value="" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control rounded-2xl" id="email" placeholder="" value="" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control rounded-2xl" id="phonenumber" placeholder="" value="" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="country">Country</label>
                    <select class="form-select d-block w-100 rounded-2xl" id="country" required>
                        <option value="">Tỉnh Bà Rịa Vũng Tàu</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="country">Quận / Huyện</label>
                    <select class="form-select d-block w-100 rounded-2xl" id="country" required>
                        <option value="">Huyện Châu Đức</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="country">Phường</label>
                    <select class="form-select d-block w-100 rounded-2xl" id="country" required>
                        <option value="">Xã Tham Đôn</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="streets">Đường</label>
                    <input type="text" class="form-control rounded-2xl" id="streets" placeholder="" value="" required>
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
            </div>
    </div>
    <div class="col-md-6 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><b>Thông tin</b></span>
        </h4>
        <div class="flex relative py-7">
            <div class="">
                <img src="https://routine.vn/media/catalog/product/cache/a2fcefb561dcc03dd69ce08e688653ae/1/0/10s22ttow013_-_green_3__1.jpg" class="image-checkout h-full w-full object-contain object-center" style="width: 17rem;height: 20rem;">
            </div>
            <div class="product ml-3 sm:ml-6 flex flex-1 flex-col">
                <div class="">
                    <div class="flex justify-between">
                        <div class="info">
                            <h4>Iphone 20 pro</h4>
                            <div class="flex">
                                <p><span style="padding: 0 5px;font-weight: 500;">Black</span></p>
                                <span class="mx-4 border-l"></span>
                                <p><span style="padding: 0 5px;font-weight: 500;">XXL</span></p>
                            </div>
                            <div class="pricee  ">
                                <h3 class="price1" style="color:red"> 15.000.000<span>đ</span></h3>
                                <h4 class="price2" style="text-decoration-line:line-through;"> 17.000.000<span>đ</span></h4>
                            </div>
                            <div class="note">
                                <p>Hàng VN chất lượng cao</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-end justify-between pt-4 mt-auto" style="margin-top: 0%;">
                    <div class="content">
                        <span class="qt-minus">-</span>
                        <span class="qt">2</span>
                        <span class="qt-plus">+</span>
                    </div>
                    <a href="">Xóa</a>
                </div>
            </div>
        </div>
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <label style="margin-top: -5%;"><b>Thành tiền</b></label>
        </h4>
        <form class="card p-2 border-0">

        </form>
        <ul class="list-group mb-3">
            <li class="list-group-item border-0 d-flex justify-content-between lh-condensed">
                <a class="text-muted"><b>Giá gốc:</b> </a>
                <a class="text-muted1">$12</a>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between lh-condensed">
                <a class="text-muted"><b>Giảm giá:</b> </a>
                <a class="text-muted1">$8</a>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between lh-condensed">
                <a class="text-muted"><b>Số lượng:</b> </a>
                <a class="text-muted1">$5</a>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between">
                <h4>Tổng: <a>$20</a></h4>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between">
                <button class="btn bg-slate-900 text-slate-50 btn-block confirm-oder rounded-full" type="submit" style="color:white; font-size:15px">Thanh Toán</button>
            </li>
        </ul>
    </div>
</div>
<style>
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

    .py-7 {
        height: 50%;
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

    .mt-1\.5 {
        margin-top: .375rem;
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .confirm-oder {
        color: white;
        background-color: #121A2D !important;
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