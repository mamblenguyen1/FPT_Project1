<?
include('User/component/header.php');
?>
<div class="container light-style flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-4" style="color: white;">
        .
    </h4>
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" href="index.php?pages=user&action=userinformation">Thông tin tài khoản</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=changepassword">Đổi mật khẩu</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=history">Lịch sử đơn hàng</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <h3>Lịch sử đơn hàng</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Tên danh mục</th>
                                                    <th>Hãng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Chi tiết sản phẩm</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Iphone 15 Promax</td>
                                                    <td>3</td>
                                                    <td>30/10/2023</td>
                                                    <td>31/10/2023</td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-primary">Chi tiết bình luận</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Laptop ROG Strix G15</td>
                                                    <td>3</td>
                                                    <td>30/10/2023</td>
                                                    <td>31/10/2023</td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-primary">Chi tiết bình luận</button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
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
        color: #4e5155 !important;
    }

    .material-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }

    .material-style .account-settings-links .list-group-item.active {
        color: #4e5155 !important;
    }

    .dark-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(255, 255, 255, 0.03) !important;
    }

    .dark-style .account-settings-links .list-group-item.active {
        color: #fff !important;
    }

    .light-style .account-settings-links .list-group-item.active {
        color: #4E5155 !important;
    }

    .light-style .account-settings-links .list-group-item {
        padding: 0.85rem 1.5rem;
        border-color: rgba(24, 28, 33, 0.03) !important;
    }
</style>