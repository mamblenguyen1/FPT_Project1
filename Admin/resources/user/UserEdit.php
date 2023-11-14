<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['edit'])) {
  $user_id = $_POST['user_id'];
  $statusId = $user->getInfouser($user_id, 'status_id');
  $statusName = $user->getInfouser($user_id, 'status_name');
}
if (isset($_POST['delete'])) {
  $user_id = $_POST['user_id'];
  $user->deleteuser($user_id);
  echo '<script>alert("Đã xóa user ! ! !")</script>';
  echo '<script>window.location.href="index.php?pages=admin&action=UserList"</script>';
}

if (isset($_POST['sua_user'])) {
  $user_id = $_POST['user_id'];
  $user_name = $_POST['user_name'] ?? "";
  $user_password = $_POST['user_password'] ?? "";
  $user_phone_number = $_POST['user_phone_number'] ?? "";
  $Province = $_POST['Province'] ?? "";
  $district = $_POST['district'] ?? "";
  $wards = $_POST['wards'] ?? "";
  $Stress = $_POST['Stress'] ?? "";
  $role_id = $_POST['role_id'] ?? "";
    if (!$user_name == "" && !$user_password == "" && !$user_phone_number == "" && !$Province == ""  && !$district == ""  && !$wards == ""  && !$Stress == "" && !$role_id == "") {

    $user->update_user($user_name, $user_password, $user_phone_number, $Province, $district, $wards, $Stress, $role_id, $user_id);
    // echo '<script>alert("Cập nhật tài khoản thành công")</script>';
    // echo '<script>window.location.href="index.php?pages=admin&action=UserList"</script>';
  } else {
    $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
  }
}


?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 style="padding-left: 30px;">Chỉnh Sửa Tài Khoản</h1>
    </div>
    <div class="add-user-form">
      <div class="card card-primary">
        <div class="card-header"></div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post">
          <input type="hidden" name="user_id" value="<? echo $user->getInfouser($user_id, 'user_id'); ?>">
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Tên người dùng</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_name" value="<? echo $user->getInfouser($user_id, 'user_name'); ?>">
            </div>
            <?
            if (isset($_POST["user_name"])) {
              if (empty($_POST["user_name"])) {
                echo '<span class="vaild">Xin vui lòng nhập tên người dùng</span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">

              <label for="exampleInputPassword1">Password</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="user_password" value="<? echo $user->getInfouser($user_id, 'user_password'); ?>">
            </div>
            <?
            if (isset($_POST["user_password"])) {
              if (empty($_POST["user_password"])) {
                echo '<span class="vaild">Xin vui lòng nhập password</span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_phone_number" value="<? echo $user->getInfouser($user_id, 'user_phone_number'); ?>">
            </div>
            <?
            if (isset($_POST["user_phone_number"])) {
              if (empty($_POST["user_phone_number"])) {
                echo '<span class="vaild">Xin vui lòng nhập số điện thoại</span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label for="exampleInputPassword1">Vai trò</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="role_id" value="<? echo $user->getInfouser($user_id, 'role_id'); ?>">
            </div>
            <?
            if (isset($_POST["role_id"])) {
              if (empty($_POST["role_id"])) {
                echo '<span class="vaild">Xin vui lòng nhập vai trò</span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label>Tỉnh / Thành Phố</label>
              <select name="Province" id="" class="form-control select2" style="width: 100%;">
                <option selected value="<? echo $user->getInfoProvince($user_id, 'province_id'); ?>"> <? echo $user->getInfoProvince($user_id, 'name'); ?></option>

                <?
                $conn = $db->pdo_get_connection();
                $stmt = $conn->prepare("SELECT * FROM province");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  foreach ($stmt as $row) {
                    echo ' <option value="' . $row['province_id'] . '">' . $row['name'] . '</option>';
                  }
                }
                ?>

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
              <select name="district" id="" class="form-control select2" style="width: 100%;">
              <option selected value="<? echo $user->getInfoDistrict($user_id, 'district_id'); ?>"> <? echo $user->getInfoDistrict($user_id, 'name'); ?></option>
                <?
                $conn = $db->pdo_get_connection();
                $stmt = $conn->prepare("SELECT * FROM district");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  foreach ($stmt as $row) {
                    echo ' <option value="' . $row['district_id'] . '">' . $row['name'] . '</option>';
                  }
                }
                ?>
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
              <select name="wards" id="" class="form-control select2" style="width: 100%;">
              <option selected value="<? echo $user->getInfoWards($user_id, 'wards_id'); ?>"> <? echo $user->getInfoWards($user_id, 'name'); ?></option>
                
                <?
                $conn = $db->pdo_get_connection();
                $stmt = $conn->prepare("SELECT * FROM wards");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  foreach ($stmt as $row) {
                    echo ' <option value="' . $row['wards_id'] . '">' . $row['name'] . '</option>';
                  }
                }
                ?>
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
              <input type="text" class="form-control" id="exampleInputEmail1" name="Stress" value="<? echo $user->getInfouser2($user_id, 'user_stress'); ?>">
            </div>
            <?
            if (isset($_POST["Stress"])) {
              if (empty($_POST["Stress"])) {
                echo '<span class="vaild">Xin vui lòng nhập đường</span>';
              } else {
                echo '';
              }
            }
            ?>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="sua_user">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>


<?php include './admin/componant/footer.php' ?>