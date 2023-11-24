<?php


require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require 'PHPMailer/src/Exception.php';




class Mailer
{

    public function sendEmail($content, $addressMail)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com'; //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'nmquang1997@gmail.com'; // SMTP username
            $mail->Password = 'znxczngepylfhjqh'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
            $mail->Port = 465; // port to connect to                
            $mail->setFrom('nmquang1997@gmail.com', 'Minh Quang Electronics');
            $mail->addAddress($addressMail);
            $mail->isHTML(true);
            $mail->Subject = 'Quên Mật Khẩu';
            $noidungthu = 'Mật Khẩu Của Bạn Là:' . $content;
            $mail->Body = $noidungthu;
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            $mail->send();
            // echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
        }
    }

    public function thanksMail($user_name, $addressMail)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com'; //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'nmquang1997@gmail.com'; // SMTP username
            $mail->Password = 'znxczngepylfhjqh'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
            $mail->Port = 465; // port to connect to                
            $mail->setFrom('nmquang1997@gmail.com', 'Liberty Technology');
            $mail->addAddress($addressMail);
            $mail->isHTML(true);
            $mail->Subject = 'Thư cảm ơn';
            $noidungthu = ' <div  style=" max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <h1 style="color: #007bff;">Thư cảm ơn ! ! !</h1>
                <p style="margin-bottom: 20px;">Kinh chào ' . $user_name . ',</p>
                <p>Chúng tôi xin chân thành cảm ơn sự quan tâm và ủng hộ của Quý khách đối với sản phẩm/dịch vụ của chúng tôi.
                    Chúng tôi luôn trân trọng mọi ý kiến đóng góp và phản hồi của Quý khách, vì đó chính là nguồn động viên quý
                    báu giúp chúng tôi ngày càng hoàn thiện.</p>
                <p>Chúng tôi rất vui mừng khi nhận được phản hồi tích cực từ phía Quý khách về chất lượng sản phẩm/dịch vụ của
                    chúng tôi <br>
                    Quý khách đã làm cho đội ngũ chúng tôi tự hào và có động lực lớn để không ngừng nỗ lực để cung cấp trải nghiệm
                    tốt nhất cho khách hàng.</p>
                <p>Chúng tôi sẽ phản hồi với khách hàng trong thời gian sớm nhất, hoặc quý khách có thể liên hệ trực tiếp  qua Email :  <a style="color: #007bff;
                    text-decoration: none;"
                        href="nmquang1997@gmail.com">nmquang1997@gmail.com</a> và SĐT 0123456789  .</p>
                <p>Trân trọng,<br>Liberty Technology</p>
            </div>
        ';
            $mail->Body = $noidungthu;
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            $mail->send();
            // echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
        }
    }

    public function ReplyMail($user_name, $addressMail, $subject, $question, $answer)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com'; //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'nmquang1997@gmail.com'; // SMTP username
            $mail->Password = 'znxczngepylfhjqh'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
            $mail->Port = 465; // port to connect to                
            $mail->setFrom('nmquang1997@gmail.com', 'Liberty Technology');
            $mail->addAddress($addressMail);
            $mail->isHTML(true);
            $mail->Subject = 'Thư phản hồi khách hàng';
            $noidungthu = ' 

            <body style="background-color:#ffffff;">
            <div style="background-color:#ffffff;">
                <table align="center" style="width:600px;" width="600"><tr><td style="line-height:0;font-size:0">
                <div style="margin:0 auto;max-width:600px;">
                    <table align="center" role="presentation" style="width:100%;">
                        <tbody>
                        <tr>
                            <td style="border:0 solid #ffffff;direction:ltr;font-size:0;padding:5px 0 5px 0;text-align:center;">
                                <table role="presentation"><tr><td class="" style="vertical-align:top;width:600px;">
                                <div class="column-per-100 outlook-group-fix" style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                    <table role="presentation" style="vertical-align:top;" width="100%">
                                        <tr>
                                            <td align="left" style="font-size:0;padding:0 25px 0 25px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:10px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-size:0;word-break:break-word;">
                                                <table role="presentation" style="border-collapse:collapse;border-spacing:0;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:600px;">
                                                            <a href="https://comparecycle.com" target="_blank">
                                                                <img alt="LOGO COMPARECYCLE" height="auto" src="https://zupimages.net/up/23/47/7ko6.png" style="display: block; height:100px;width:200px;font-size:13px; margin: 0 auto;" width="600">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </td></tr></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600" ><tr><td style="line-height:0;font-size:0">
                <div style="background:#1f3543;background-color:#1f3543;margin:0 auto;max-width:600px;">
                    <table align="center" role="presentation" style="background:#1f3543;background-color:#1f3543;width:100%;">
                        <tbody>
                        <tr>
                            <td style="border:0 solid #ffffff;direction:ltr;font-size:0;padding:20px 0 20px 0;text-align:center;">
                                <table role="presentation"><tr><td class="" style="vertical-align:top;width:600px;" >
                                <div class="column-per-100 outlook-group-fix" style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                    <table role="presentation" style="vertical-align:top;" width="100%">
                                        <tr>
                                            <td align="left" style="font-size:0;padding:10px 50px 0 50px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:30px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="text-align: center; margin: 10px 0;">
                                                                <span style="color:#ffffff;font-family:Open Sans;font-size:30px;">
                                                                    <b>Thư phản hồi khách hàng</b>
                                                                </span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </td></tr></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0;font-size:0">
                <div style="background:#f8fcff;background-color:#f8fcff;margin:0 auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f8fcff;background-color:#f8fcff;width:100%;">
                        <tbody>
                        <tr>
                            <td style="border:0 solid #ffffff;direction:ltr;font-size:0;padding:0 0 0 0;padding-bottom:0;padding-left:0;padding-right:0;padding-top:0;text-align:center;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" >
                                <div class="column-per-100 outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                        <tr>
                                            <td align="center" style="font-size:0;word-break:break-word;">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:600px;">
                                                            <img alt="Séparateur - CompaRecycle" height="auto" src="https://zupimages.net/up/21/07/698t.png" style="border:none;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:13px;" width="600">
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </td></tr></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0;font-size:0">
                <div style="background:#f8fcff;background-color:#f8fcff;margin:0 auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f8fcff;background-color:#f8fcff;width:100%;">
                        <tbody>
                        <tr>
                            <td style="border:0 solid #e73535;direction:ltr;font-size:0;text-align:center;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" >
                                <div class="column-per-100 outlook-group-fix" style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                        <tr>
                                            <td align="left" style="background:transparent;font-size:0;padding:0 25px 0 25px;padding-top:0;padding-right:25px;padding-bottom:0;padding-left:25px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:17px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <h1 class="text-build-content" style="line-height:32px;text-align:center;; margin-top: 10px; margin-bottom: 10px; font-weight: normal;">
                                                                <span style="color:#55575d;font-family:Open Sans;font-size:17px;">
                                                                    <p>Xin chào <strong>' . $user_name . '</strong>,</p>
                                                                    <b>Căm ơn bạn đã gửi thư phàn hồi đến chúng tôi !</b>
                                                                </span>
                                                    </h1>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size:0;padding:15px 25px 25px 25px; word-break:break-word;">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 1px #171717;font-size:1px;margin:0 auto;width:310px;" role="presentation" width="310px" ><tr><td style="height:0;line-height:0;">  
                                            </td></tr></table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0;padding:0 35px 0 35px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:14px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="margin: 10px 0;">
                                                        <span style="font-family:Open Sans;font-size:14px;">Chi tiết câu trả lời của bạn : </span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0;padding:0 35px 0 35px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:14px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="margin: 10px 0;">
                                                        <span style="font-family:Open Sans;font-size:13px;">Chủ đề : <strong>' . $subject . '</strong></span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0;padding:0 35px 0 35px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:14px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="margin: 10px 0;">
                                                        <span style="font-family:Open Sans;font-size:13px;">Nội dung câu hỏi của bạn :</span>
                                                        <p><strong>" ' . $question . ' "</strong></p>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0;padding:0 35px 0 35px;padding-top:0;padding-right:35px;padding-bottom:0;padding-left:35px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:14px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="line-height: 12px; margin: 10px 0;">
                                                        <span style="font-family:Open Sans;font-size:14px;">Thay bộ phận chăm sóc khách hàng, chúng tôi xin phép trả lời câu hỏi của bạn như sau  :</span>
                                                    </p>
                                                    <p class="text-build-content" style="line-height: 16px; margin: 10px 0;">
                                                        <span style="font-family:Open Sans;font-size:14px;"><strong>" ' . $answer . ' "</strong></span>
                                                    </p>
                                                    <!-- <p class="text-build-content" style="line-height: 12px; margin: 10px 0;">
                                                        <span style="font-family:Open Sans;font-size:14px;">- vendre vos mobiles*</span>
                                                    </p> -->
                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:0;padding:15px 35px 25px 35px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:14px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="line-height: 15px; margin: 10px 0;">
                                                        <p style="font-size:14px;">Nếu có thắc mắc về câu trả lời của chúng tôi , xin vui lòng liên hệ trực tiếp với chúng tôi qua : </p>
                                                        <a class="link-build-content" style="color:inherit;; text-decoration: none;" target="_blank" href="https://comparecycle.com">
                                                                    <span style="color:inherit;font-family:Open Sans;font-size:14px;">
                                                                        <p><strong>Email : demo@gmail.com</strong></p>
                                                                    </span>
                                                                    <span style="color:inherit;font-family:Open Sans;font-size:14px;">
                                                                        <p><strong>SĐT : 0123456789</strong></p>
                                                                    </span>
                                                        </a>
                                                    </p>
                                                    <p class="text-build-content" style="line-height: 15px; margin: 10px auto;">
                                                        Xem thêm sản phẩm mới của chúng tôi : 
                                                                <span >
                                                                    <a style="color:#82d77f; padding: 15px 20px; background-color: #82d77f; color: white; display: block; 
                                                                    width: 200px;
                                                                    text-decoration: none;
                                                                    border-radius: 10px;
                                                                    margin: 15px 15px;" href=""><b>Ghé thăm cửa hàng chúng tôi</b></a>
                                                                </span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </td></tr></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </td></tr></table><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0;font-size:0">
                <div style="margin:0 auto;max-width:600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                        <tbody>
                        <tr>
                            <td style="direction:ltr;font-size:0;padding:20px 0 20px 0;padding-top:0;text-align:center;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" >
                                <div class="column-per-100 outlook-group-fix" style="font-size:0;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                        <tr>
                                            <td align="left" style="font-size:0;padding:20px 20px 0 20px;word-break:break-word;">
                                                <div style="font-family:Arial, sans-serif;font-size:11px;letter-spacing:normal;line-height:1;text-align:left;color:#000000;">
                                                    <p class="text-build-content" style="text-align: center; margin: 10px 0;">
                                                        <span style="color:#55575d;font-family:Open Sans;font-size:14px;line-height:16px;">Liberty Technology - Thiên đường công nghệ.</span>
                                                        <a class="link-build-content" style="color:inherit;; text-decoration: none;" target="_blank" href="#">
                                                                  
                                                        </a>
                                                    </p>
                                                    <p class="text-build-content" style="text-align: center; margin: 10px 0;">
                                                        <span style="color:#55575d;font-family:Open Sans;font-size:11px;line-height:16px;">226, xã Chữ A , huyện chữ B , TP Chữ C - 0123456789</span>
                                                    </p>
                                                    <p class="text-build-content" style="text-align: center; margin: 10px 0;">
                                                        <span style="color:#55575d;font-family:Open Sans;font-size:12px;line-height:16px;">©2023 Copyright Liberty Technology</span>
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                </td></tr></table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </td></tr></table>
            </div>
            </body>
            
        ';
            $mail->Body = $noidungthu;
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            $mail->send();
            // echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
        }
    }
    public function MailOrder($user_name, $addressMail)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->Host = 'smtp.gmail.com'; //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'nmquang1997@gmail.com'; // SMTP username
            $mail->Password = 'znxczngepylfhjqh'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
            $mail->Port = 465; // port to connect to                
            $mail->setFrom('nmquang1997@gmail.com', 'Liberty Technology');
            $mail->addAddress($addressMail);
            $mail->isHTML(true);
            $mail->Subject = 'Thông tin đơn hàng';
            $noidungthu = ' <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tr>
              <td height="20"></td>
            </tr>
            <tr>
              <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                  <tr class="visibleMobile">
                    <td height="30"></td>
                  </tr>
                  <tr>
                    <td>
                      <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                        <tbody>
                          <tr>
                              <td align="center"> 
                                <img src="https://www.zupimages.net/up/23/47/7ko6.png" width="100" height="100" alt="logo"/>
                              </td>
                          </tr>
                          <tr class="visibleMobile">
                              <td height="20"></td>
                          </tr>
                          <tr>
                              <td style="font-size: 21px; color: #ff0000; letter-spacing: -1px; font-family:  sans-serif; text-align: center;">
                                Hóa Đơn
                              </td>
                          </tr>
                          <tr>
                            <td>
                              <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                <tbody>
                                  <tr class="hiddenMobile">
                                    <td height="40"></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; color: #5b5b5b; font-family:  sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                      Xin Chào, TÚ.
                                      <br> Cảm ơn bạn đã mua sắm từ cửa hàng của chúng tôi và đặt hàng.
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                <tbody>
                                  <tr class="hiddenMobile">
                                    <td height="50"></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size: 12px; color: #5b5b5b; font-family:  sans-serif; line-height: 22px; vertical-align: top; text-align: right;">
                                      <small>Đơn hàng</small> #123<br />
                                      <small>Ngày 11 tháng 24 năm 2023</small>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <!-- /Header -->
          <!-- Order Details -->
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tbody>
              <tr>
                <td>
                  <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                    <tbody>
                      <tr>
                      <tr class="hiddenMobile">
                        <td height="60"></td>
                      </tr>
                      <tr>
                        <td>
                          <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                              <tr>
                                <th style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                                  Tên Sản Phẩm
                                </th>
                                <th style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                                  <small></small>
                                </th>
                                <th style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                                  Số Lượng
                                </th>
                                <th style="font-size: 12px; font-family:  sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                                  Tổng
                                </th>
                              </tr>
                              <tr>
                                <td height="1" style="background: #bebebe;" colspan="4"></td>
                              </tr>
                              <tr>
                                <td height="10" colspan="4"></td>
                              </tr>
                              <tr>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #ff0000;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                                  Iphone 15 Pro
                                </td>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"><small></small></td>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">1</td>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">$299.95</td>
                              </tr>
                              <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td height="20"></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- /Order Details -->
          <!-- Total -->
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tbody>
              <tr>
                <td>
                  <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                    <tbody>
                      <tr>
                        <td>
                          <!-- Table Total -->
                          <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                              <tr>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                  Subtotal
                                </td>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                                  $329.90
                                </td>
                              </tr>
                              <tr>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                  <strong>Thành Tiền</strong>
                                </td>
                                <td style="font-size: 12px; font-family:  sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                  <strong>$344.90</strong>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- /Table Total -->
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- /Total -->
          <!-- Information -->
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tbody>
              <tr>
                <td>
                  <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
                    <tbody>
                      <tr>
                      <tr class="visibleMobile">
                        <td height="40"></td>
                      </tr>
                      <tr>
                        <td>
                          <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                              <tr>
                                <td>
                                  <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                    <tbody>
                                      <tr>
                                        <td style="font-size: 11px; font-family:  sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                          <strong>Địa Chỉ: </strong>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="100%" height="10"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                          226, Xã chữ A<br> Huyện chữ B<br> Tp. chữ C<br> Hotline: 09090909
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                    <tbody>
                                      <tr>
                                        <td style="font-size: 11px; font-family:  sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                          <strong>Phương Thức Thanh Toán</strong>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="100%" height="10"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                          Thanh toán khi nhận hàng.
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                            <tbody>
                              <tr>
                                <td>
                                  <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                                    <tbody>
                                      <tr class="hiddenMobile">
                                        <td height="35"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 11px; font-family:  sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                          <strong>Thông Tin Vận Chuyển</strong>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="100%" height="10"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                          Đơn hàng của bạn được giao trong vòng 1h đến 2h.
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                                    <tbody>
                                      <tr class="hiddenMobile">
                                        <td height="35"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 11px; font-family:  sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                          <strong>Hình Thức Vận Chuyển</strong>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td width="100%" height="10"></td>
                                      </tr>
                                      <tr>
                                        <td style="font-size: 12px; font-family:  sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                          Giao hàng hỏa tốc
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr class="visibleMobile">
                        <td height="30"></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- /Information -->
          <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
            <tr>
              <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                  <tr>
                    <td>
                      <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                        <tbody>
                          <tr>
                            <td style="font-size: 12px; color: #5b5b5b; font-family:  sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                              Chúc bạn một ngày tốt lành !!
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr class="spacer">
                    <td height="50"></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
          </table>
        ';
            $mail->Body = $noidungthu;
            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );
            $mail->send();
            // echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            echo 'Error: ', $mail->ErrorInfo;
        }
    }
}
