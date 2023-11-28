<?
include('google/config.php');
$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a style="margin:20px 0" href="'.$google_client->createAuthUrl().'"><img style="width:250px ; height="50px"" src="https://androidexample365.com/content/images/2019/11/GoogleSignUpDark.png" /></a>';
}
?>





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
<body style="margin: 0; padding:0; max-width: 100%;">
<!-- Form Đăng Nhập -->
<div class="container-login">
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.7.0/p5.min.js" style="background-color: #00ffdc;"></script>
  <div class="login-wrap" style="box-shadow: none;">
    <div class="login-html" style="margin-top: 10px; position: relative; margin-left: 150%; margin-top: 9%; border-radius: 10px" >
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
                <?
              echo '<div ">'.$login_button . '</div>';
              ?>
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
<script>
var Chars = ["*","X","+","-","1","0","1","@","vn"];
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
   background(255, .009);
  for (var i =0; i < tiles; i++) {
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
    if ((this.x > width+(tileSize * 8)) || (this.x < -tileSize * 8)) {this.x = random(width / tileSize) * tileSize;}
    this.y += (ty * dropspeed);
    if ((this.y > height+(tileSize * 8)) || (this.y < -tileSize * 8)) {this.y = random(-height / tileSize) * tileSize; this.x = random(width / tileSize) * tileSize;}
	if ((this.y < ((window.innerHeight)))) this.y+= this.tU;
}
  this.update = function() {
  var thecol = round(random(0, 10));
    var thebri = 0;
    if (thecol == 10) {thecol = 0; thebri = 100;}
    else {myHue = 120; thecol = 100; thebri = 50;}
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
</body>