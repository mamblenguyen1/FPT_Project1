<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['them_user'])) {
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $user_password = $_POST['user_password'];
  $user_phone_number = $_POST['user_phone_number'];
  $user_address = $_POST['user_address'];
  $role_id = $_POST['role_id'];
  if (($user_name != '') && ($email != '') && ($user_password != '') && ($user_phone_number != '') && ($user_address != '') && ($user_password != '') && ($role_id != '')) {
    $user->user_insert($user_name, $email, $user_phone_number, $user_address, $user_password, $role_id);
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
              <label>Địa chỉ</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="user_address">
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
              <label>Vai Trò</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="role_id">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>

          </div>
          <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="them_user">Submit</button>
            </div>
        </form>
      </div>

    </div>

  </div>


  <?php include './admin/componant/footer.php' ?>