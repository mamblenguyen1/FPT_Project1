<?
// Đăng Nhập
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) && empty($email)) {
    echo '<script>alert("Email không hợp lệ !!!")</script>';
  } else {
    if ($user->checkAccount($email, $pass)) {
      echo '<script>alert("Vô hiệu hóa!!")</script>';
    } else {
      if ($user->checkUser($email, $pass)) {
        foreach (($user->checkRole($email, $pass)) as $row) {
          if ($row == "1") {
            $_SESSION['user'] = $email;
            setcookie("role", '1', time() + 3600, "/");
            $userid = $user->getInfoUserEmail($email, 'user_id');
            setcookie("userID", $userid, time() + 3600, "/");
            header('location: ./?pages=user&action=home');
          } else {
            $result = $user->userid($email, $pass);
            $_SESSION['user'] = $email;
            setcookie("role", '2', time() + 3600, "/");
            $userid = $user->getInfoUserEmail($email, 'user_id');
            setcookie("userID", $userid, time() + 3600, "/");
            header('location: ./?pages=user&action=home');
          }
        }
      } else {
        echo '<script>alert("Sai mật khẩu !!!")</script>';
      }
    }
  }
}
?>

<?
// Đăng Ký

?>
<!-- Form Đăng Nhập -->
<div class="container-login">
  <div class="login-wrap" style="box-shadow: none;">
    <div class="login-html" style="margin-top: 80px;">
      <input id="tab-1" type="radio" name="tab" class="sign-in dongmo" checked="checked"><label for="tab-1" class="tab">Đăng nhập</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up dongmo1"><label for="tab-2" class="tab">Đăng kí</label>
      <div class="login-form">

        <div class="sign-in-htm">
          <form action="" method="post">
            <div class="group">
              <label for="user" class="label">Email</label>
              <input id="user" name="email" type="text" class="input">
              <span class="val-log">
                <?
                if (isset($_POST["submit"])) {
                  $email = $_POST["email"];
                  if ($email == "") {
                    echo "Xin vui lòng nhập Email";
                  } else {
                    echo '';
                  }
                }
                ?>
              </span>

            </div>
            <div class="group">
              <label for="pass" class="label">Mật khẩu</label>
              <input id="pass" name="pass" type="password" class="input" data-type="password">
              <span class="val-log">
                <?
                if (isset($_POST["submit"])) {
                  $pass = $_POST["pass"];
                  if ($pass == "") {
                    echo "Xin vui lòng nhập mật khẩu";
                  } else {
                    echo '';
                  }
                }
                ?>
              </span>
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Nhớ tài khoản</label>
            </div>
            <div class="group">
              <!-- <input type="submit" class="button" value="Sign In"> -->
              <button type="submit" name="submit" class="button"> Đăng nhập</button>
            </div>
          </form>

          <div class="hr"></div>

          <!-- Quên Mật Khẩu -->
          <div class="foot-lnk">
            <a href="index.php?pages=user&action=forget">Quên mật khẩu?</a>
          </div>

        </div>


        <!-- Form Đăng Ký -->
        <div class="sign-up-htm">
          <form action="" method="post">
            <div class="group">
              <label for="pass" class="label">Email</label>
              <input id="pass" name="regEmail" type="text" class="input">
              <?
              if (isset($_POST["submitreg"])) {
                $regEmail = $_POST["regEmail"];
                if ($regEmail == "") {
                  echo "Xin vui lòng nhập Email";
                } else {
                  echo '';
                }
              }
              ?>
            </div>

            <div class="group">
              <label for="pass" class="label">Mật khẩu</label>
              <input id="pass" name="pass1" type="password" class="input" data-type="password">
              <?
              if (isset($_POST["submitreg"])) {
                $pass1 = $_POST["pass1"];
                if ($pass1 == "") {
                  echo "Xin vui lòng nhập mật khẩu";
                } else {
                  echo '';
                }
              }
              ?>
            </div>

            <div class="group">
              <label for="pass" class="label">Nhập lại mật khẩu</label>
              <input id="pass" name="pass2" type="password" class="input" data-type="password">
              <?
              if (isset($_POST["submitreg"])) {
                $pass2 = $_POST["pass2"];
                if ($pass2 == "") {
                  echo "Xin vui lòng nhập lại mật khẩu";
                } else {
                  echo '';
                }
              }
              ?>
            </div>

            <div class="group">
              <label for="user" class="label">Họ và tên</label>
              <input id="user" name="username" type="text" class="input">
              <?
              if (isset($_POST["submitreg"])) {
                $username = $_POST["username"];
                if ($username == "") {
                  echo "Xin vui lòng nhập lại họ và tên";
                } else {
                  echo '';
                }
              }
              ?>
            </div>

            <div class="group">
              <label for="user" class="label">Số điện thoại</label>
              <input id="user" name="phone" type="text" class="input">
              <?
                if (isset($_POST["submitreg"])) {
                  $phone = $_POST["phone"];
                  if ($phone == "") {
                    echo "Xin vui lòng nhập lại số điện thoại";
                  } else {
                    echo '';
                  }
                }
                ?>
            </div>

            <div class="group">
              <button type="submit" name="submitreg" class="button"> Đăng Ký</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<?

if (isset($_POST["submitreg"])) {
  $regEmail = $_POST["regEmail"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"];
  $username = $_POST["username"];
  $phone = $_POST["phone"];
  if (!filter_var($regEmail, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Vui lòng thêm @ vào phần email !!!")</script>';
    echo '
    <script>
    var myDiv = document.getElementById("tab-2");
    console.log(myDiv);
    myDiv.setAttribute("checked", "true");
    var myDiv = document.getElementById("tab-1");
    console.log(myDiv);
    myDiv.setAttribute("checked", "false");
    // var myDiv1 = document.getElementsByClassName("dongmo");
    // myDiv1.removeAttribute("checked");
  </script>
    ';
  } else {
    if (!empty($regEmail) && !empty($pass1) && !empty($pass2) && !empty($username) && !empty($phone) && $pass1 == $pass2) {

      if ($user->checkDuplicateEmail(trim($regEmail))) {
        echo '<div class="danger" role="alert"> Email đã tồn tại! </div>';
      } else {
        $user->user_create($username, $regEmail, $phone, $pass1);
        echo '<div class="success" role="alert"> Chúc mừng bạn đã đăng ký thành công! </div>';
      }
    } else {
      echo '<script>alert("Vui lòng nhập đúng !!!")</script>';
      echo '
      <script>
      var myDiv = document.getElementById("tab-2");
      console.log(myDiv);
      myDiv.setAttribute("checked", "true");
      var myDiv = document.getElementById("tab-1");
      console.log(myDiv);
      myDiv.setAttribute("checked", "false");
      // var myDiv1 = document.getElementsByClassName("dongmo");
      // myDiv1.removeAttribute("checked");
    </script>
      ';
    }
  }
}
?>
<link rel="stylesheet" href="css/login.css">

<style>
  .danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #d32535;
    font-size: 20px;
    position: relative;
    padding: 0.75rem 1.25rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
  }

  .success {
    color: #fff;
    background-color: #28a745;
    border-color: #23923d;
    font-size: 20px;
    position: relative;
    padding: 0.75rem 1.25rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
  }

  .val-log {
    color: red;
    display: block;
    margin-top: 15px;
  }

  .foot-lnk a:hover {
    color: #00ffdc;
  }
</style>