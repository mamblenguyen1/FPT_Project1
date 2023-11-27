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
                    <a class="list-group-item list-group-item-action active" href="index.php?pages=user&action=informationuser" style="color: var(--secondary-color);">Thông tin tài khoản</a>
                    <a class="list-group-item list-group-item-action " href="index.php?pages=user&action=updateuser" style="color: var(--secondary-color);">Cập nhật tài khoản</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=changepassword" style="color: var(--secondary-color);">Đổi mật khẩu</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=history" style="color: var(--secondary-color);">Lịch sử đơn hàng</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <h3 style="color: var(--secondary-color);">Thông tin người dùng</h3>
                    <div id="General">
                        <div class="card-body media align-items-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-80">
                            <div class="media-body ml-4">

                            </div>
                        </div>
                        <br>
                        <?
                        echo '
                    <label for=""><b>Họ và tên <span class="span0" style="margin-left: 3%;">:</span></b> <span>' . $user->getInfouser($_COOKIE['userID'], 'user_name') . '</span></label>
                    <label for=""><b>Email <span class="span1" style="margin-left: 6%;">:</span></b> <span>' . $user->getInfouser($_COOKIE['userID'], 'email') . '</span></label>
                    <label for=""><b>Địa chỉ <span class="span2" style="margin-left: 5%;">:</span></b> <span>' . $user->getInfo_address($_COOKIE['userID'], 'user_street') . ' - ' . $user->getInfo_address($_COOKIE['userID'], 'xa') . ' -  ' . $user->getInfo_address($_COOKIE['userID'], 'huyen') . ' -  ' . $user->getInfo_address($_COOKIE['userID'], 'thanhpho') . '</span></label>                 
                       <label for=""><b>Số điện thoại <span class="span3" style="margin-left: 0%;">:</span></b> <span>' . $user->getInfouser($_COOKIE['userID'], 'user_phone_number') . '</span></label>
                    <label for=""><b>Mật khẩu <span class="span4" style="margin-left: 3%;">:</span></b> <span>******</span></label>
                    ';
                        ?>
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
    .pt-0{
        border: 1px solid white;
    }

    .account-settings-links a{
        background: var(--primary-color);
        border: 1px solid white;
    }
    .list-group{
        margin-bottom: 0px;
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