<?
include('User/component/header.php');
?>



<?
// lấy thông tin người dùng
if (isset($_COOKIE['userID'])) {
	$name = $user->getInfouser($_COOKIE['userID'], 'user_name');
	$email = $user->getInfouser($_COOKIE['userID'], 'email');
} else {
	$name = '';
	$email = '';
}
?>

<?
// gửi liên hệ
if (isset($_POST['contact-btn'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	echo $subject;
	$content = $_POST['content'];
	if ($name != '' && $email != '' && $subject != '' && $content != '') {
		$contact->send_contact($name, $email, $subject, $content);
		echo '<script>alert("Cảm ơn bạn đã gửi liên hệ cho chúng tôi")</script>';
		echo '<script>window.location.href="index.php?pages=user&action=contact"</script>';
	} else {
		$_SESSION['messages'] = 'Vui lòng nhập đầy đủ thông tin';
	}
}
?>
<main id="tg-main" class="tg-main tg-haslayout">
	<div class="tg-sectionspace tg-haslayout">
		<div class="container">
			<div class="row">
				<div class="tg-contactus">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2><span>Xin chào</span>Hãy liên hệ với chúng tôi</h2>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="tg-locationmap tg-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36800.40819801512!2d105.72293413981635!3d9.968401673826834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08906415c355f%3A0x416815a99ebd841e!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1698430652726!5m2!1svi!2s" width="600" height="710" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<form class="tg-formtheme tg-formcontactus" method="post" action="">
							<fieldset>
								<div class="form-group">
									<input value="<?= $name ?>" type="text" name="name" class="form-control" placeholder="Họ và tên">
									<?
									if (isset($_POST["name"])) {
										if (empty($_POST["name"])) {
											echo '<span style="color:red" class="vaild">Vui lòng nhập họ tên</span>';
										} else {
											echo '';
										}
									}
									?>
								</div>
								<div class="form-group">
									<input value="<?= $email ?>" type="text" name="email" class="form-control" placeholder="Email">
									<?
									if (isset($_POST["email"])) {
										if (empty($_POST["email"])) {
											echo '<span style="color:red" class="vaild">Vui lòng nhập email</span>';
										} else {
											echo '';
										}
									}
									?>
								</div>
								<div class="form-group" style="width:100%" >
									<input type="text" name="subject" class="form-control" placeholder="Chủ đề">
									<?
									if (isset($_POST["subject"])) {
										if (empty($_POST["subject"])) {
											echo '<span style="color:red" class="vaild">Vui lòng điền chủ đề</span>';
										} else {
											echo '';
										}
									}
									?>
								</div>
								<div class="form-group tg-hastextarea">
									<textarea name="content" placeholder="Nội dung"></textarea>
									<?
									if (isset($_POST["content"])) {
										if (empty($_POST["content"])) {
											echo '<span style="color:red" class="alert">Vui lòng nhập nội dung</span>';
										} else {
											echo '';
										}
									}
									?>
								</div>
								<div class="form-group">
									<button name="contact-btn" type="submit" class="tg-btn tg-active">Gửi</button>
								</div>
							</fieldset>
						</form>
						<div class="tg-contactdetail">
							<div class="tg-sectionhead">
								<h2>Tìm chúng tôi qua địa chỉ</h2>
							</div>
							<ul class="tg-contactinfo">
								<li>
									<i class="icon-apartment"></i>
									<address>Toà nhà FPT Polytechnic, Đ. Số 22, Thường Thạnh, Cái Răng, Cần Thơ</address>
								</li>
								<li>
									<i class="icon-phone-handset"></i>
									<span>
										<em>0907 370 341</em>
										<em>0999 923 992</em>
									</span>
								</li>
								<li>
									<i class="icon-clock"></i>
									<span>Làm việc các ngày trong tuần từ 9h - 18h</span>
								</li>
								<li>
									<i class="icon-envelope"></i>
									<span>
										<em><a href="mailto:support@domain.com">support@domain.com</a></em>
										<em><a href="mailto:info@domain.com">info@domain.com</a></em>
									</span>
								</li>
							</ul>
							<ul class="tg-socialicons">
								<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
								<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
								<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
								<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
								<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--************************************
					Contact Us End
			*************************************-->
</main>
<!--************************************
				Main End
		*************************************-->

<?
include('user/component/footer.php');
?>