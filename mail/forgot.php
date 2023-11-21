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
                <p style="margin-bottom: 20px;">Kinh chào '.$user_name.',</p>
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
}