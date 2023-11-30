<?
// Đăng Nhập
if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  if (empty($email) && empty($pass)) {
    echo "<script>alert('Vui lòng nhập Email và mật khẩu!')</script>";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
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
}
?>

<body style="margin: 0; padding:0; max-width: 100%;">
  <!-- Form Đăng Nhập -->
  <div class="container-login">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.7.0/p5.min.js" style="background-color: #00ffdc;"></script>
    <div class="login-wrap" style="box-shadow: none;">
      <div class="login-html" style="margin-top: 10px; position: relative; margin-left: 150%; margin-top: 9%; border-radius: 10px">
        <input id="tab-1" type="radio" name="tab" class="sign-in dongmo" checked="checked"><label for="tab-1" class="tab">Đăng nhập</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up dongmo1"><label for="tab-2" class="tab">Đăng kí</label>
        <div class="login-form">
          <div class="sign-in-htm">
            <form action="" method="post">
              <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline" data-text="signin_with" data-size="large" data-logo_alignment="left">
              </div>
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
                <button type="submit" name="submit" class="button" style="position: absolute;margin-top: 25%;"> Đăng nhập</button>
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
    if (!filter_var($regEmail, FILTER_VALIDATE_EMAIL) && !empty($pass1) && !empty($pass2) && !empty($username) && !empty($phone) && $pass1 == $pass2) {
      echo '<script>alert("Vui lòng nhập đúng định dạng Email !!!")</script>';
      echo '
    <script>
    var myDiv = document.getElementById("tab-2");
    console.log(myDiv);
    myDiv.setAttribute("checked", "true");
    var myDiv = document.getElementById("tab-1");
    console.log(myDiv);
    myDiv.setAttribute("checked", "false");
  </script>
    ';
    } else {
      if (!empty($regEmail) && !empty($pass1) && !empty($pass2) && !empty($username) && !empty($phone) && $pass1 == $pass2) {
        if ($user->checkDuplicateEmail(trim($regEmail))) {
          echo '<script>alert("Email đã tồn tại !!!")</script>';
          echo '
        <script>
        var myDiv = document.getElementById("tab-2");
        console.log(myDiv);
        myDiv.setAttribute("checked", "true");
        var myDiv = document.getElementById("tab-1");
        console.log(myDiv);
        myDiv.setAttribute("checked", "false");
      </script>
        ';
        } else {
          $user->user_create($username, $regEmail, $phone, $pass1);
          echo '<script>alert("Chúc mừng bạn đã đăng ký thành công !!!")</script>';
        }
      } else if ($pass1 != $pass2) {
        echo '<script>alert("Mật Khẩu không giống Nhau !!!")</script>';
        echo '
        <script>
        var myDiv = document.getElementById("tab-2");
        console.log(myDiv);
        myDiv.setAttribute("checked", "true");
        var myDiv = document.getElementById("tab-1");
        console.log(myDiv);
        myDiv.setAttribute("checked", "false");
      </script>
        ';
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
    </script>
      ';
      }
    }
  }
  ?>
  <div id="g_id_onload" data-client_id="982902368259-u614j7ige69qenvsembcsrrt2q72s0ui.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-auto_prompt="false">
  </div>
  <!-- Display the user's profile info -->
  <div class="pro-data hidden"></div>
  <div id="g_id_onload" data-client_id="982902368259-u614j7ige69qenvsembcsrrt2q72s0ui.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-auto_prompt="true">
  </div>
  <link rel="stylesheet" href="css/login.css">
  <style>
    .g_id_signin {
      position: absolute;
      margin-top: 65%;
      margin-left: 2%;
      z-index: 2;
    }
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
  <script>
    var Chars = ["*", "X", "+", "-", "1", "0", "1", "@", "vn"];
    var Cells = [];
    var tileSize = 16;
    var dropspeed = 8;
    var tiles = 160;
    var x = 0;
    function setup() {
      noStroke();
      colorMode(HSB, 360, 100, 1, .1);
      createCanvas(window.innerWidth, window.innerHeight);
      for (var i = 0; i < tiles; i++) {
        console.log(width / tileSize);
        x += tileSize;
        var y = round(random(height / dropspeed) * tileSize) - window.innerHeight;
        var r = tileSize;
        var h = random(100, 150);
        var t = random(.8, 8);
        var u = random(.3, .8);
        Cells[i] = new Matrix(x, y, r, h, t, u);
      }
    }

    function draw() {
      background(0, .009);
      for (var i = 0; i < tiles; i++) {
        Cells[i].spread();
        Cells[i].update();
      }
    }

    function Matrix(isX, isY, myD, myHue, newX, newY) {
      this.x = isX;
      this.y = isY;
      this.tS = newX;
      this.tU = newY;
      this.diameter = myD;
      this.h = myHue;
      this.spread = function() {
        var tx = 0;
        var ty = round(random(0, 2));
        this.x += (tx * tileSize);
        if ((this.x > width + (tileSize * 8)) || (this.x < -tileSize * 8)) {
          this.x = random(width / tileSize) * tileSize;
        }
        this.y += (ty * dropspeed);
        if ((this.y > height + (tileSize * 8)) || (this.y < -tileSize * 8)) {
          this.y = random(-height / tileSize) * tileSize;
          this.x = random(width / tileSize) * tileSize;
        }
        if ((this.y < ((window.innerHeight)))) this.y += this.tU;
      }
      this.update = function() {
        var thecol = round(random(0, 10));
        var thebri = 0;
        if (thecol == 10) {
          thecol = 0;
          thebri = 100;
        } else {
          myHue = 120;
          thecol = 100;
          thebri = 50;
        }
        fill(myHue, thecol, thebri, .7);
        textSize(14);
        textFont('Verdana');
        var thechar = round(random(0, 8));
        text((Chars[(thechar)]), this.x, this.y);
      }
    }

    function mousePressed() {
      tileSize = random(0.3, 2);
      tiles = random(1, 239);
      for (var i = 0; i < tiles; i++) {
        var x = random(width / tileSize) * tileSize;
        var y = random((height / tileSize) * tileSize) - height;
        var r = tileSize;
        var h = random(10, 300);
        var t = random(.5, 2);
        var u = random(.3, 3.8);
        Cells[i] = new Matrix(x, y, r, h, t, u);
      }
    }
  </script>
  <script src="https://accounts.google.com/gsi/client" async></script>
  <script>
    // Credential response handler function
    // Ví dụ: đặt một cookie có tên "user" với giá trị "John Doe" có hiệu lực trong 7 ngày
    function handleCredentialResponse(response) {
      // Post JWT token to server-side
      fetch("auth_init.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            request_type: 'user_auth',
            credential: response.credential
          }),
        })
        .then(response => response.json())
        .then(data => {
          if (data.status == 1) {
            let responsePayload = data.pdata;
            window.location.href = "http://localhost/FPT_Project1/index.php";
            // setcookie("userID", responsePayload.sub, time() + 3600, "/");
            // let profileHTML = '<h3>Welcome ' + responsePayload.given_name + '! <a href="javascript:void(0);" onclick="signOut(' + responsePayload.sub + ');">Sign out</a></h3>';
            // profileHTML += '<img src="' + responsePayload.picture + '"/><p><b>Auth ID: </b>' + responsePayload.sub + '</p><p><b>Name: </b>' + responsePayload.name + '</p><p><b>Email: </b>' + responsePayload.email + '</p>';
            // document.getElementsByClassName("pro-data")[0].innerHTML = profileHTML;
            // document.querySelector("#btnWrap").classList.add("hidden");
            // document.querySelector(".pro-data").classList.remove("hidden");
          }
        })
        .catch(console.error);
    }
    // Sign out the user
    function signOut(authID) {
      document.getElementsByClassName("pro-data")[0].innerHTML = '';
      document.querySelector("#btnWrap").classList.remove("hidden");
      document.querySelector(".pro-data").classList.add("hidden");
    }
  </script>
</body>