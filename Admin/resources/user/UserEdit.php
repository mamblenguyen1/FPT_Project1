<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
function isValidPassword($user_password) { // Biểu thức chính quy bắt lỗi mật khẩu
  $pattern = '/^(?=.*[a-z])(?=.*\d)[a-z\d]{8,20}$/';
  return preg_match($pattern, $user_password);
}
function isValidPhoneNumber($user_phone_number) { // Biểu thức chính quy bắt lỗi SĐT
  $pattern = '/^0\d{9}$/';
  return preg_match($pattern, $user_phone_number);
}
if (isset($_POST['edit'])) {
  $user_id = $_POST['user_id'];
  $statusId = $user->getInfouser($user_id, 'status_id');
  $statusName = $user->getInfouser($user_id, 'status_name');
}
if (isset($_POST['delete'])) {
  $user_id = $_POST['user_id'];
  $user->deleteuser($user_id);
  echo '
    <script>
        Toastify({
            text: "Xóa Tài Khoản Thành Công !!!",
            duration: 3000,
            gravity: "top",
            position: "center",
            backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
            stopOnFocus: true,
            close: true, // Cho phép đóng toast bằng cách nhấp vào
            className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
            style: {
                fontSize:"23px",
                padding:"20px",
            },
        }).showToast();
        setTimeout(function() {
          window.location.href = "index.php?pages=admin&action=UserList";
      }, 800);
    </script>';
}

if (isset($_POST['sua_user'])) {
  $user_id = $_POST['user_id'];
  $user_name = $_POST['user_name'] ?? "";
  $user_password = $_POST['user_password'] ?? "";
  $user_phone_number = $_POST['user_phone_number'] ?? "";
  $Province = $_POST['Province'] ?? "";
  $district = $_POST['district'] ?? "";
  $wards = $_POST['wards'] ?? "";
  $Street = $_POST['Street'] ?? "";
  $role_id = $_POST['role_id'] ?? "";
  if (!$user_name == "" && !$user_password == "" && !$user_phone_number == "" && !$Province == ""  && !$district == ""  && !$wards == ""  && !$Street == "" && !$role_id == "") {
    if (isValidPassword($user_password)){
      if (isValidPhoneNumber($user_phone_number)) {
        $user->update_user($user_name, $user_password, $user_phone_number, $Province, $district, $wards, $Street, $role_id, $user_id);
        echo '
          <script>
            Toastify({
              text: "Sửa Tài Khoản Thành Công !!!",
              duration: 3000,
              gravity: "top",
              position: "center",
              backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
              stopOnFocus: true,
              close: true, // Cho phép đóng toast bằng cách nhấp vào
              className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
              style: {
                fontSize:"23px",
                padding:"20px",
              },
            }).showToast();
          </script>';
      } else {
        echo '
          <script>
              Toastify({
                  text: "Vui lòng nhập đúng định dạng SĐT !!!",
                  duration: 3000,
                  gravity: "top",
                  position: "center",
                  backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
                  stopOnFocus: true,
                  close: true, // Cho phép đóng toast bằng cách nhấp vào
                  className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
                  style: {
                      fontSize:"23px",
                      padding:"20px",
                  },
              }).showToast();
          </script>';
     }
    } else {
      echo '
        <script>
          Toastify({
            text: "Mật khẩu phải lớn hơn 8 ký tự và có ít nhất 1 thường và 1 số !!!",
            duration: 3000,
            gravity: "top",
            position: "center",
            backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
            stopOnFocus: true,
            close: true, // Cho phép đóng toast bằng cách nhấp vào
            className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
            style: {
              fontSize:"23px",
              padding:"20px",
            },
          }).showToast();
        </script>';
    }
  }
   else {
    echo '
      <script>
        Toastify({
          text: "Vui lòng nhập đủ thông tin !!!",
          duration: 3000,
          gravity: "top",
          position: "center",
          backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
          stopOnFocus: true,
          close: true, // Cho phép đóng toast bằng cách nhấp vào
          className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
          style: {
            fontSize:"23px",
            padding:"20px",
          },
        }).showToast();
      </script>';
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
              <input type="password" class="form-control" id="exampleInputPassword1" name="user_password" value="<? echo $user->getInfouser($user_id, 'user_password'); ?>">
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
              <select name="role_id" id="role"class="form-control select2" style="width: 100%;">
              <option selected="selected" value="<?= $user->getInfoUserRole($user_id, 'role_id')?>"><?= $user->getInfoUserRole($user_id, 'role_name')?></option>
                                <?
                                $roleid = $user->getInfoUserRole($user_id, 'role_id');
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM `role` WHERE role_id <> $roleid");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['role_id'] . '" >' . $row['role_name'] . '</option>';
                                    }
                                }
                                ?>
              </select>
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

<script>
  $(document).ready(function() {
    $.ajax({
      url: "./admin/resources/address/province.php",
      dataType: 'json',
      success: function(data) {
        $("#Province").html("");
        for (i = 0; i < data.length; i++) {
          var Province = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
          var str = ` 
                <option value="${Province['province_id']}"> ${Province['name']} </option>
                   `;
          $("#Province").append(str);
        }
        $("#Province").on("change", function(e) {
          layHuyen();
        });
      }
    });
  })
</script>
<script>
  function layHuyen() {
    var province_id = $("#Province").val();
    $.ajax({
      url: "./admin/resources/address/district.php?province_id=" + province_id,
      dataType: 'json',
      success: function(data) {
        $("#district").html("");
        for (i = 0; i < data.length; i++) {
          var district = data[i];
          var str = ` 
                <option  value="${district['district_id']}">${district['name']} </option>`;
          $("#district").append(str);
        }
        $("#district").on("change", function(e) {
          layXa();
        });
      }
    });
  }
</script>
<script>
  function layXa() {
    var district_id = $("#district").val();
    $.ajax({
      url: "./admin/resources/address/wards.php?district_id=" + district_id,
      dataType: 'json',
      success: function(data) {
        $("#wards").html("");
        for (i = 0; i < data.length; i++) {
          var wards = data[i];
          var str = ` 
                <option value="${wards['wards_id']}">${wards['name']} </option>`;
          $("#wards").append(str);
        }
      }
    });
  }
</script>
<?php include './admin/componant/footer.php' ?>