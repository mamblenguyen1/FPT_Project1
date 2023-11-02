<link rel="stylesheet" href="css/login.css">
<div class="container-login">
  <div class="login-wrap" style="box-shadow: none;">
    <div class="login-html" style="margin-top: 80px;">
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng nhập</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Đăng kí</label>
      <div class="login-form">
        <div class="sign-in-htm">
          <form action="" method="post">
            <div class="group">
              <label for="user" class="label">Email</label>
              <input id="user" type="Email" class="input">
            </div>
            <div class="group">
              <label for="pass" class="label">Mật khẩu</label>
              <input id="pass" type="password" class="input" data-type="password">
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Nhớ tài khoản</label>
            </div>
            <div class="group">
              <!-- <input type="submit" class="button" value="Sign In"> -->
              <button type="submit" class="button"> Đăng nhập</button>
            </div>
          </form>
          <div class="hr"></div>
          <div class="foot-lnk">
            <a href="#">Quên mật khẩu?</a>
          </div>
        </div>
        <div class="sign-up-htm" >
          <form action="" method="post">
            <div class="group">
              <label for="pass" class="label">Email</label>
              <input id="pass" type="Email" class="input">
            </div>

            <div class="group">
              <label for="pass" class="label">Mật khẩu</label>
              <input id="pass" type="password" class="input" data-type="password">
            </div>

            <div class="group">
              <label for="pass" class="label">Nhập lại mật khẩu</label>
              <input id="pass" type="password" class="input" data-type="password">
            </div>

            <div class="group">
              <label for="user" class="label">Tên người dùng</label>
              <input id="user" type="text" class="input">
            </div>
            
            <div class="group">
              <label for="user" class="label">Địa chỉ</label>
              <input id="user" type="text" class="input">
            </div>
            
            <div class="group">
              <label for="user" class="label">Số điện thoại</label>
              <input id="user" type="text" class="input">
            </div>

            <div class="group">
              <button type="submit" class="button"> Đăng Ký</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>