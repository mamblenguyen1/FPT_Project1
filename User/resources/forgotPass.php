<?
if (isset($_POST['forgot'])) {
    $email = $_POST['email'];
    if ($user->checkDuplicateEmail($email)) {
        function generateRandomString($length) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numbers = '0123456789';
            $charactersLength = strlen($characters);
            $numbersLength = strlen($numbers);
            $randomString = '';
        
            // Tạo ngẫu nhiên 4 chữ cái
            for ($i = 0; $i < 4; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
        
            // Tạo ngẫu nhiên 4 số
            for ($i = 0; $i < 4; $i++) {
                $randomString .= $numbers[rand(0, $numbersLength - 1)];
            }
        
            // Trộn chuỗi ngẫu nhiên
            $randomString = str_shuffle($randomString);
        
            return $randomString;
        }
        
        // Gọi hàm để tạo dãy ngẫu nhiên
        $randomCode = generateRandomString(8);
        $newRandomPass = md5($randomCode);
        $mail->sendEmail('Mật khẩu mới của bạn là :  ' . $randomCode, $email);
        $user->update_NewPass($newRandomPass, $email);
        echo '<script>alert("Xin vui lòng kiểm tra lại Email   !!")</script>';
        echo '<script>window.location.href="index.php?pages=user&action=login"</script>';
    } else {
        echo '<script>alert("Email nhập vào sai  !!")</script>';
    }
}
?>
<div class="container">
    <div class="page-left">
        <div class="header">
            <div class="header1">Quên mật khẩu </div>
            <div class="header2">Xin vui lòng nhập Email để lấy lại mật khẩu</div>
        </div>
        <div class="form-page">
            <form action="" method="post">

                <input class="email-add" type="text" name="email" id="" placeholder="Email Address" />
                <p>
                </p>
                <button class="login" type="submit" name="forgot">Lấy mật khẩu</button>
        </div>
    </div>
    <div class="page-right"></div>
    </form>
</div>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        box-sizing: border-box;
        font-family: Sans-serif;
        margin: 0;
    }

    .container {
        display: flex;
        height: 100vh;
    }

    .page-left {
        overflow: hidden;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        max-width: 400px;
        animation-name: page-left;
        animation-duration: 1s;
        animation-delay: 1s;
        animation-fill-mode: both;
    }

    .form-page {
        display: flex;
        flex-direction: column;
        width: 80%;
    }

    .form-page input {
        width: 100%;
    }

    .header {
        max-width: 80%;
    }

    .header1 {
        padding-top: 100px;
        font-weight: bold;
        font-size: 20px;
        font-family: Sans-serif;
        padding-bottom: 10px;
        animation-name: slide;
        animation-duration: 3s;
        animation-delay: 3.1s;
        animation-fill-mode: both;
    }

    .header2 {
        padding-bottom: 40px;
        color: grey;
        font-size: 15px;
        animation-name: slide;
        animation-duration: 3s;
        animation-delay: 3.2s;
        animation-fill-mode: both;
    }

    .email-add {
        margin-bottom: 20px;
        height: 45px;
        border-radius: 3px;
        padding-left: 15px;
        border: 2px solid lightgrey;
        font-size: 15px;
        width: 270px;
        animation-name: slide;
        animation-duration: 1s;
        animation-delay: 1.2s;
        animation-fill-mode: both;
    }

    .pswd {
        height: 45px;
        border-radius: 3px;
        padding-left: 15px;
        border: 2px solid lightgrey;
        font-size: 15px;
        width: 270px;
        animation-name: slide;
        animation-duration: 3s;
        animation-delay: 3.6s;
        animation-fill-mode: both;
    }

    a {
        color: black;
        float: right;
        font-size: 14px;
        animation-name: slide;
        animation-duration: 3s;
        animation-delay: 3.8s;
        animation-fill-mode: both;
    }

    .login {
        font-weight: normal;
        font-size: 15px;
        color: white;
        height: 45px;
        border-radius: 3px;
        border: none;
        background-color: #0f7ef1;
        margin-bottom: 140px;
        margin-top: 10px;
        width: 100%;
        letter-spacing: 1px;
        animation-name: slide;
        animation-delay: 4s;
        animation-duration: 3s;
        animation-fill-mode: both;

    }

    .page-right {
        flex: 1;
        background-image: url("images/forgotBanner.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    @keyframes page-left {
        0% {
            opacity: 0;
            max-width: 0;
        }

        100% {
            opacity: 1;
            max-width: 400px;

        }
    }

    @keyframes slide {
        0% {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-25px);
        }

        100% {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);

        }
    }
</style>