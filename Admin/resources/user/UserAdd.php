<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['them_user'])) {
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $user_password = $_POST['user_password'];
  $user_phone_number = $_POST['user_phone_number'];
  $Province = $_POST['Province'];
  $district = $_POST['district'];
  $wards = $_POST['wards'];
  $role_id = $_POST['role_id'];
  $Stress = $_POST['Stress'];

  // echo $user_name;
  // echo $email;
  // echo $user_password;
  // echo $user_phone_number;
  // echo  $Province;
  // echo  $district;
  // echo $wards;
  // echo $role_id;
  // exit();
  if (($user_name != '') && ($email != '') && ($user_password != '') && ($Stress != '') && ($user_phone_number != '') && ($Province != '') && ($district != '') && ($wards != '') && ($user_password != '') && ($role_id != '')) {
    $user->user_insert($user_name, $email, $user_phone_number, $Province, $district, $wards, $Stress ,$user_password, $role_id);
    echo '<script>alert("Thêm tài khoản thành công !!!")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=UserList</script>';
  }
}
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1>Thêm Tài Khoản</h1>
    </div>
    <div class="add-cate-form">
      <div class="card card-primary">
        <div class="card-header"></div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="">
          <div class="card-body">
            <div class="form-group">
              <label>Tên người dùng</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_name">
            </div>
            <?
            if (isset($_POST["user_name"])) {
              if (empty($_POST["user_name"])) {
                echo '<span class="vaild">Xin vui lòng nhập tên người dùng </span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <?
            if (isset($_POST["email"])) {
              if (empty($_POST["email"])) {
                echo '<span class="vaild">Xin vui lòng nhập email </span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="user_password">
            </div>
            <?
            if (isset($_POST["user_password"])) {
              if (empty($_POST["user_password"])) {
                echo '<span class="vaild">Xin vui lòng nhập tên password </span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_phone_number">
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
              <label>Vai trò tài khoản</label>
              <select name="role_id" id="" class="form-control select2" style="width: 100%;">
                <option selected value="0">Chọn vai trò</option>
                <?
                $conn = $db->pdo_get_connection();
                $stmt = $conn->prepare("SELECT * FROM `role` 
                 ");
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                  foreach ($stmt as $row) {
                    echo ' <option value="' . $row['role_id'] . '">' . $row['role_name'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>
            <?
            if (isset($_POST["role_id"])) {
              if (empty($_POST["role_id"])) {
                echo '<span class="vaild">Xin vui lòng chọn vai trò</span>';
              } else {
                echo '';
              }
            }
            ?>

            <div class="form-group">
              <label>Tỉnh / Thành Phố</label>
              <select name="Province" id="" class="form-control select2" style="width: 100%;">
                <option selected value="0">Chọn tỉnh / thành phố</option>

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
                <option selected value="0">Chọn quận / huyện</option>
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
                <option selected value="0">Chọn phường / xã</option>
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
              <input type="text" class="form-control" id="exampleInputEmail1" name="Stress">
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

            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="them_user">Submit</button>
            </div>
        </form>
      </div>

    </div>

  </div>


  <?php include './admin/componant/footer.php' ?>