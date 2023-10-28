<link rel="stylesheet" href="../css/forget.css">
<?
// include('../../database/pdo.php');
// include('../users/user.php');
// include('../../mail/forgot.php');
// $mail = new Mailer();
// $user = new User();

if (isset($_POST['forgot'])) {
    $email = $_POST['email'];
    if ($user->checkDuplicateEmail($email)) {
        $newRandomPass = rand();
        $mail->sendEmail('Mật khẩu mới của bạn là :  ' . $newRandomPass, $email);
        $user->update_NewPass($newRandomPass, $email);
        echo '<script>alert("Xin vui lòng kiểm tra lại Email   !!")</script>';
        echo '<script>window.location.href="../../index.php?act=login"</script>';
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
