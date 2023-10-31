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
  $user_address = $_POST['user_address'] ?? "";
  $role_id = $_POST['role_id'] ?? "";
  if (!$user_name == "" || !$user_password = "" || !$user_phone_number = "" || !$user_address = "" || !$role_id = "") {
    $user->update_user($user_name, $user_password, $user_phone_number, $user_address, $role_id, $user_id);
    echo '<script>alert("Cập nhật tài khoản thành công")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=UserList"</script>';
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
              <label for="exampleInputEmail1">Password</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_password" value="<? echo $user->getInfouser($user_id, 'user_password'); ?>">
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
              <label for="exampleInputEmail1">Địa chỉ</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_address" value="<? echo $user->getInfouser($user_id, 'user_address'); ?>">
            </div>
            <?
            if (isset($_POST["user_address"])) {
              if (empty($_POST["user_address"])) {
                echo '<span class="vaild">Xin vui lòng nhập địa chỉ</span>';
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