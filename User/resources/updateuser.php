<?
include('User/component/header.php');
?>
<?
$user_id = $_COOKIE['userID'];
if (isset($_POST['edit'])) {
    $user_id = $_POST['user_id'];
}
if (isset($_POST['luu_user'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'] ?? "";
    $user_phone_number = $_POST['user_phone_number'] ?? "";
    $Province = $_POST['Province'] ?? "";
    $district = $_POST['district'] ?? "";
    $wards = $_POST['wards'] ?? "";
    $Street = $_POST['Street'] ?? "";
    if (!$user_name == "" && !$user_phone_number == "" && !$Province == ""  && !$district == ""  && !$wards == ""  && !$Street == "") {
        $user->update_user1($user_name, $user_phone_number, $Province, $district, $wards, $Street , $user_id);
        echo '<script>alert("Cập nhật tài khoản thành công")</script>';
        echo '<script>window.location.href="index.php?pages=user&action=updateuser"</script>';
    } else {
        $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
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
                    <a class="list-group-item list-group-item-action active" href="index.php?pages=user&action=updateuser">Cập nhật tài khoản</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=changepassword">Đổi mật khẩu</a>
                    <a class="list-group-item list-group-item-action" href="index.php?pages=user&action=history">Lịch sử đơn hàng</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <h3 style="color: var(--secondary-color);">Thông tin người dùng</h3>
                    <div id="General">
                        <div class="card-body media align-items-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-80" style="margin-left: 3%; padding-bottom: 10px;">
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-primary" style="width: 16.5%;">
                                    Upload new photo
                                    <input type="file" class="account-settings-fileinput">
                                </label> &nbsp;
                                <button type="button" class="btn btn-default md-btn-flat" style="border: 1px solid var(--secondary-color); color: var(--secondary-color)">Reset</button>
                            </div>
                        </div>
                        <br>

                        <form class="card-body" method="post">
                            <input type="hidden" name="user_id" value="<? echo $user->getInfo_user($user_id, 'user_id'); ?>">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control mb-1" name="user_name" value="<? echo $user->getInfo_user($user_id, 'user_name'); ?>">
                                <?
                                if (isset($_POST["user_name"])) {
                                    if (empty($_POST["user_name"])) {
                                        echo '<span class="vaild">Xin vui lòng nhập tên người dùng</span>';
                                    } else {
                                        echo '';
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" name="user_phone_number" value="<? echo $user->getInfo_user($user_id, 'user_phone_number'); ?>">
                                <?
                                if (isset($_POST["user_phone_number"])) {
                                    if (empty($_POST["user_phone_number"])) {
                                        echo '<span class="vaild">Xin vui lòng nhập tên người dùng</span>';
                                    } else {
                                        echo '';
                                    }
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Tỉnh / Thành Phố</label>
                                <select name="Province" id="Province" class="form-control select2" style="width: 100%;">
                                    <option selected value="<? echo $user->getInfoProvince($user_id, 'province_id'); ?>"> <? echo $user->getInfoProvince($user_id, 'name'); ?></option>
                                </select>
                            </div>
                            <?
                            if (isset($_POST["province"])) {
                                if (empty($_POST["province"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn tỉnh / thành phố</span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>

                            <div class="form-group">
                                <label>Quận / Huyện</label>
                                <select name="district" id="district" class="form-control select2" style="width: 100%;">
                                    <option selected value="<? echo $user->getInfoDistrict($user_id, 'district_id'); ?>"> <? echo $user->getInfoDistrict($user_id, 'name'); ?></option>
                                </select>
                            </div>
                            <?
                            if (isset($_POST["district"])) {
                                if (empty($_POST["district"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn quận / huyện</span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>

                            <div class="form-group">
                                <label>Phường / Xã</label>
                                <select name="wards" id="wards" class="form-control select2" style="width: 100%;">
                                    <option selected value="<? echo $user->getInfoWards($user_id, 'wards_id'); ?>"> <? echo $user->getInfoWards($user_id, 'name'); ?></option>


                                </select>
                            </div>
                            <?
                            if (isset($_POST["wards"])) {
                                if (empty($_POST["wards"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn phường / xã</span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>

                            <div class="form-group">
                                <label>Đường</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Street" value="<? echo $user->getInfouser2($user_id, 'user_street'); ?>">
                            </div>
                            <?
                            if (isset($_POST["Street"])) {
                                if (empty($_POST["Street"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập đường</span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>

                            <div class="text-right mt-3">
                                <button type="submit" class="tg-btn tg-active" name="luu_user">Lưu</button>&nbsp;
                                <button type="submit" class="btn btn-default">Hủy</button>
                            </div>
                            <br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){    
    $.ajax({
        url: "./admin/resources/address/province.php",       
        dataType:'json',         
        success: function(data){     
            $("#Province").html("");
            for (i=0; i<data.length; i++){            
                var Province = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                var str = ` 
                <option value="${Province['province_id']}"> ${Province['name']} </option>
                   `;
                $("#Province").append(str);
            }
            $("#Province").on("change", function(e) { layHuyen();  });
        }
    });
})

</script>
<script>
function layHuyen(){
    var province_id = $("#Province").val();
    $.ajax({
        url: "./admin/resources/address/district.php?province_id=" + province_id,
        dataType:'json',         
        success: function(data){     
            $("#district").html("");
            for (i=0; i<data.length; i++){            
                var district = data[i]; 
                var str = ` 
                <option  value="${district['district_id']}">${district['name']} </option>`;
                $("#district").append(str);
            }       
            $("#district").on("change", function(e) { layXa();  });     
        }
    });
}
</script>
<script>
function layXa(){
    var district_id = $("#district").val();
    $.ajax({
        url: "./admin/resources/address/wards.php?district_id=" + district_id,
        dataType:'json',         
        success: function(data){     
            $("#wards").html("");
            for (i=0; i<data.length; i++){            
                var wards = data[i]; 
                var str = ` 
                <option  value="${wards['wards_id']}">${wards['name']} </option>`;
                $("#wards").append(str);
            }            
        }
    });
}
</script>
<?
include('user/component/footer.php');
?>
<style>
    label{
        color: var(secondary-color);
    }
        .pt-0{
        border: 1px solid white;
    }

    .account-settings-links a{
        background: var(--primary-color);
        border: 1px solid white;
    }
    .vaild {
        color: red;
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
