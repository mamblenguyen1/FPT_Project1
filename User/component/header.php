<?
include('style.php');
?>
<header id="tg-header" class="tg-header tg-haslayout">
	<div class="tg-topbar" style="background-color:white; color:white">
		<div class="tg-middlecontainer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<strong class="tg-logo"><a href="index.php?pages=user&action=home"><img style="height: 140px;width:140px" src="images/loweb.png" alt="company name here"></a></strong>
						<div class="tg-wishlistandcart" style="z-index: 2;float: right;position: absolute; padding-top: 70px;margin-left: 84%;">
							<?
							if (isset($_COOKIE['userID'])) {
								echo '<div class="dropdown tg-themedropdown tg-minicartdropdown">
								<a href="index.php?pages=user&action=cart" id="tg-minicart" class="tg-btnthemedropdown" style="margin-left: -45%;">
									<span class="tg-themebadge">' . $order->CountCart1($_COOKIE['userID']) . '</span>
									<i class="icon-cart"></i>
									<span style="text-transform : none">' . number_format($order->cart_total_monney($_COOKIE['userID'])) . ' đ</span>
								</a>
							';
							} else {
								echo '<div class="dropdown tg-themedropdown tg-minicartdropdown">
								<a href="index.php?pages=user&action=cart" id="tg-minicart" class="tg-btnthemedropdown" style="margin-left: -40%;">
									<span class="tg-themebadge"></span>
									<i class="icon-cart"></i>
									<span style="text-transform : none">Giỏ hàng</span>
								</a>
								';
							}
							?>
							<div class="tg-userlogin" style="margin-top: -12.2%; width: 300px; background: var(--primary-color); color: var(--secondary-color);">
								<?
								if (isset($_COOKIE['userID'])) {
									if ($_COOKIE['role'] == 2) {
										echo '
								<figure><a href=""><img style="height:40px; width:40px" src="images/user1.jpg" alt="image description"></a></figure>
								<div class="user">
								<div class="user-name">
									<span>Chào ! ' . $user->getInfouser2($_COOKIE['userID'], 'user_name') . '</span>
									<ul class="menu" style="position: relative;display: block;padding: 10px 30px;margin-top: 15%;margin-left: -70%;">
										<ul style="width: 295px;">
											<li><a href="index.php?pages=user&action=informationuser&userID=' . isset($_COOKIE['userID']) . '">Cập nhật người dùng</a></li>
											<li><a class="logout-btn" href="./index.php?pages=user&action=order">Đơn mua</a></li>
											<li><a class="logout-btn" href="./index.php?pages=user&action=logout">Đăng Xuất</a></li>
										</ul>
									</ul>
								</div>
								<img src="images/dark_theme_icon/moon.png" id="icon" style="width: 25px; height: 25px; cursor: pointer;margin-left: 55%;position: absolute;margin-bottom: 3%;">
							</div>
								';
									} else {
										echo '
								<figure><a href=""><img style="height:40px; width:40px" src="images/user1.jpg" alt="image description"></a></figure>
								<div class="user">
								<div class="user-name">
									<span>Chào ! ' . $user->getInfouser2($_COOKIE['userID'], 'user_name') . '</span>
									<ul class="menu" style="position: relative;display: block;padding: 10px 30px;margin-top: 15%;margin-left: -65%;">
										<ul>
											<li><a href="index.php?pages=user&action=informationuser&userID=' . isset($_COOKIE['userID']) . '">Cập nhật người dùng</a></li>
											<li><a href="index.php?pages=admin&action=dashboard">Vào trang quản trị</a></li>
											<li><a class="logout-btn" href="./index.php?pages=user&action=order">Đơn mua</a></li>
											<li><a class="logout-btn" href="./index.php?pages=user&action=logout">Đăng Xuất</a></li>
										</ul>
									</ul>
								</div>
								<img src="images/dark_theme_icon/moon.png" id="icon" style="width: 25px; height: 25px; cursor: pointer;margin-left: 55%;position: absolute;margin-bottom: 3%;">
							</div>
								';
									}
								} else {
									echo '
							<a class="login-btn" href="index.php?pages=user&action=login">Đăng nhập</a>
							<img src="images/dark_theme_icon/moon.png" id="icon" style="width: 25px; height: 25px; cursor: pointer;margin-left: 5%;position: absolute;">
							';
								}
								?>
							</div>
						</div>
					</div>
					<div class="tg-searchbox">
						<form class="tg-formtheme tg-formsearch" method="POST" action="./?pages=user&action=products">
							<fieldset>
								<select id="category-select" name="cate">
									<option value="0">Tất cả</option>
									<?
									$product = new ProductFunction();
									$row = $product->category_select_all();
									foreach ($row as $ketqua) {
										extract($ketqua);
									?>
										<option value="<?= $category_id ?>"><?= $category_name ?></option>
									<?
									}
									?>
								</select>
								<input id="search-input" type="text" name="keyword" class="typeahead form-control" placeholder="Tìm kiếm sản phẩm. . .">
								<button name="search-btn" type="submit"><i class="icon-magnifier" style="font-size:24px"></i></i></button>
							</fieldset>
							<?
							if (isset($_POST['search-btn'])) {
								$id = $_POST['cate'];
								$search = $_POST['keyword'];
								echo "<script>window.location.href = './?pages=user&action=products&id=$id&search=$search'</script>";
							};
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tg-navigationarea">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<nav id="tg-nav" class="tg-nav">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
							<ul>
								<li class="menu-item-has-children menu-item-has-mega-menu">
									<a href="javascript:void(0);">Tất cả danh mục</a>

									<div class="mega-menu">
										<?
										$row = $product->category_select_all();
										foreach ($row as $ketqua) {
											extract($ketqua);
										?>
											<ul class="tg-themetabnav" role="tablist">
												<li role="presentation" class="active render-type">
													<a class="category" href="./?pages=user&action=products&category=<?= $category_id ?>"><span><?= $category_name ?></span></a>
													<ul>
														<?
														$row = $product->category_type_select_all($category_id);
														foreach ($row as $ketqua) {
															extract($ketqua);
														?>
															<li><a href="index.php?pages=user&action=products&type=<?= $type_id ?>"><?= $type_name ?></a></li>
														<?
														}
														?>
													</ul>
												</li>
											</ul>

										<?
										}
										?>
									</div>
								</li>

								<li class="">
									<a href="index.php?pages=user&action=home">Trang Chủ</a>
								</li>

								<li class="">
									<a href="index.php?pages=user&action=products">Sản Phẩm</a>
								</li>

								<li>
									<a href="index.php?pages=user&action=introduce">Giới thiệu</a>
								</li>

								<li>
									<a href="index.php?pages=user&action=policy">Chính Sách</a>
								</li>

								<li>
									<a href="#">Tin Tức</a>
								</li>

								<li>
									<a href="index.php?pages=user&action=contact">Liên Hệ</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

<script>
	var icon = document.getElementById("icon");
	icon.onclick = function() {
		document.body.classList.toggle("dark-theme");
		if (document.body.classList.contains("dark-theme")) {
			icon.src = "images/dark_theme_icon/sun.png";
		} else {
			icon.src = "images/dark_theme_icon/moon.png";
		}
	}
</script>
<style>
	#icon {
		width: 25px;
		height: 25px;
		cursor: pointer;
		margin-left: 55%;
		position: absolute;
		margin-bottom: 3%;
	}

	#category-select {
		width: 20%;
		flex: 1;
		border: 1px solid #ccc;
		border-radius: 4px 0 0 4px;
		padding: 8px;
		height: 44px;
	}

	#search-input {
		width: 71.3%;
		flex: 1;
		border: 1px solid #ccc;
		border-radius: 0 0 0 0;
		margin-left: -4;
	}

	.tg-userlogin {
		padding: 30px 0;
	}

	.menu {
		position: relative;
		display: block;
		padding: 20px 30px;
	}

	.login-btn {
		display: inline-block;
		padding: 5px 15px;
	}

	.user {
		width: 250px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.category {
		font-weight: bold;
	}

	.render-type ul li a:hover {
		text-decoration: underline;
		background-color: #77B748 !important;
		color: white;
	}

	.logout {
		padding-bottom: 8.5px;
	}

	.menu ul {
		background-color: #504C4C;
		position: absolute;
		width: 295px;
		display: none;
		opacity: .9;
		top: 10px;
	}

	.menu ul li {
		margin: 10px 0;
		list-style: none;
	}

	.menu ul li a {
		display: inline-block;
		z-index: 1000000;
		padding: 0px 40px;
		margin: 0px 20px;
		color: white;
	}

	.menu ul li a:hover {
		background-color: #504C4C;
		color: black;
		font-weight: bold;
	}

	.menu:hover>ul {
		display: block;
	}
</style>