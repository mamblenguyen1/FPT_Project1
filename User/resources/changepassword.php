<?
include('User/component/header.php');
?>
<?
$user_id = $_COOKIE['userID'];
if (isset($_POST['submituser'])) {
    $OldPass = $_POST['Old'];
    $old_hash = md5($OldPass);
    $old_query = ($user->getInfouser2($user_id, 'user_password'));
    // echo $old_hash ;
    // echo '---';
    // echo $old_query;
    // exit();
    $NewPass = $_POST['New'];
    $NewPassAg = $_POST["Again"];
    if (!empty($OldPass) && !empty($NewPass) && !empty($NewPassAg)) {
        if ($old_hash === $old_query) {
            if ($NewPass != $NewPassAg) {
                // echo '<script>alert("Nhập lại mật khẩu không đúng")</script>';
                // echo '<script>window.location.href="index.php?pages=user&action=changepassword"</script>';
                echo ' <div class="alert alert-warning">
                <strong>Lỗi !</strong> Nhập lại mật khẩu cũ không đúng</div>';
            } else {
                $new_pass_hash = md5($NewPass);
                $user->update_Pass_user($new_pass_hash, $user_id);
                echo ' <div class="alert alert-success">
        <strong>Chúc mừng !</strong> Bạn đã đổi mật khẩu thành công</div>';
            }
        } else {
            // echo '<script>alert("Mật khẩu cũ không đúng")</script>';
            // echo '<script>window.location.href="index.php?pages=user&action=changepassword"</script>';
            echo ' <div class="alert alert-warning">
            <strong>Lỗi !</strong> Mật khẩu cũ không đúng</div>';
        }
    } else {
        // echo '<script>alert("Xin lòng nhập đầy đủ thông tin")</script>';
        // echo '<script>window.location.href="index.php?pages=user&action=changepassword"</script>';
        echo ' <div class="alert alert-warning">
        <strong>Lỗi !</strong> Vui lòng nhập đầy đủ thông tin</div>';
    }
}

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
                    <a class="list-group-item list-group-item-action active " href="index.php?pages=user&action=changepassword">Đổi mật khẩu</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=history">Lịch sử đơn hàng</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <h3 style="color: var(--secondary-color);">Đổi mật khẩu</h3>
                    <div id="General">
                        <br>
                        <form class="card-body" method="post">
                            <div class="form-group">
                                <label class="form-label">Mật khẩu cũ</label>
                                <input type="password" class="form-control mb-1" name="Old">
                                <?
                                if (isset($_POST["submituser"])) {
                                    $OldPass = $_POST["Old"];
                                    if ($OldPass == "") {
                                        echo "";
                                    } else {
                                        echo '';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="New">
                                <?
                                if (isset($_POST["submituser"])) {
                                    $NewPass = $_POST["New"];
                                    if ($NewPass == "") {
                                        echo "";
                                    } else {
                                        echo '';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control mb-1" name="Again">
                                <?
                                if (isset($_POST["submituser"])) {
                                    $NewPassAg = $_POST["Again"];
                                    if ($NewPassAg == "") {
                                        echo "";
                                    } else {
                                        echo '';
                                    }
                                }
                                ?>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="tg-btn tg-active" name="submituser">Lưu</button>&nbsp;
                                <button type="submit" class="btn btn-default">hủy</button>
                            </div>
                            <br>
                        </form>
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