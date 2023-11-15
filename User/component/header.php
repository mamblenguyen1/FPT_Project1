<?
include('style.php');
?>

<!--************************************
				Header Start
		*************************************-->
<header id="tg-header" class="tg-header tg-haslayout">
	<div class="tg-topbar" style="background-color:#504c4c; color:white">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ul class="tg-addnav">
						<li>
							<a href="" style="color:white">
								<i class="icon-envelope"></i>
								<em>Liên hệ</em>
							</a>
						</li>
						<li>
							<a href="" style="color:white">
								<i class="icon-question-circle"></i>
								<em>Trợ giúp</em>
							</a>
						</li>
					</ul>
					<!-- <div class="dropdown tg-themedropdown tg-currencydropdown">
								<a href="" id="tg-currenty" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="icon-earth"></i>
									<span>Đơn vị </span>
								</a>
								<ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
									<li>
										<a href="">
											<i>£</i>
											<span>British Pound</span>
										</a>
									</li>
									<li>
										<a href="">
											<i>$</i>
											<span>Us Dollar</span>
										</a>
									</li>
									<li>
										<a href="">
											<i>€</i>
											<span>Euro</span>
										</a>
									</li>
								</ul>
							</div> -->
					<div class="tg-userlogin">

						<?
						if (isset($_COOKIE['userID'])) {
							if ($_COOKIE['role'] == 2) {
								echo '
								<figure><a href=""><img style="height:40px; width:40px" src="images/user1.jpg" alt="image description"></a></figure>
								<div class="user">
								<div class="user-name">
									<span>Chào ! Minh Quang</span>
									<ul class="menu">
										<ul>
											<li><a href="index.php?pages=user&action=informationuser&userID=' . isset($_COOKIE['userID']) . '">Cập nhật người dùng</a></li>
										</ul>
									</ul>
									
								</div>
								<div class="logout">
								<a class="logout-btn" href="./index.php?pages=user&action=logout">Đăng Xuất</a>
	
								</div>
							</div>
								';
							} else {
								echo '
								<figure><a href=""><img style="height:40px; width:40px" src="images/user1.jpg" alt="image description"></a></figure>
								<div class="user">
								<div class="user-name">
									<span>Chào ! Minh Quang</span>
									<ul class="menu">
										<ul>
											<li><a href="index.php?pages=user&action=informationuser&userID=' . isset($_COOKIE['userID']) . '">Cập nhật người dùng</a></li>
											<li><a href="index.php?pages=admin&action=dashboard">Vào trang quản trị</a></li>
	
										</ul>
									</ul>
								</div>
								<div class="logout">
									<a class="logout-btn" href="./index.php?pages=user&action=logout">Đăng Xuất</a>
	
								</div>
							</div>
								';
							}
						} else {
							echo '
							<a class="login-btn" href="index.php?pages=user&action=login">Đăng nhập</a>
							';
						}
						?>




					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tg-middlecontainer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<strong class="tg-logo"><a href="index.php?pages=user&action=home"><img style="height: 50px;" src="images/logo.png" alt="company name here"></a></strong>
					<div class="tg-wishlistandcart">
						<div class="dropdown tg-themedropdown tg-wishlistdropdown">
							<a href="" id="tg-wishlisst" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="tg-themebadge">3</span>
								<i class="icon-heart"></i>
								<span>Yêu thích</span>
							</a>
							<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-wishlisst">
								<div class="tg-description">
									<p>Chưa có sản phẩm yêu thích!</p>
								</div>
							</div>
						</div>
						<div class="dropdown tg-themedropdown tg-minicartdropdown">
							<a href="index.php?pages=user&action=cart" id="tg-minicart" class="tg-btnthemedropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="tg-themebadge">3</span>
								<i class="icon-cart"></i>
								<span>$123.00</span>
							</a>

							<div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
								<div class="tg-minicartbody">
									<div class="tg-minicarproduct">
										<figure>
											<img style="width: 70px; height: 80px;" src="images/iphone.jpg" alt="image description">

										</figure>
										<div class="tg-minicarproductdata">
											<h5><a href="">Iphone 15 pro max</a></h5>
											<h6><a href="">$ 12.15</a></h6>
										</div>
									</div>

								</div>
								<div class="tg-minicartfoot">
									<a class="tg-btnemptycart" href="">
										<i class="fa fa-trash-o"></i>
										<span>Xóa toàn bộ</span>
									</a>
									<span class="tg-subtotal">Tổng cộng: <strong>35.78</strong></span>
									<div class="tg-btns">
										<a class="tg-btn tg-active" href="index.php?pages=user&action=cart">Xem giỏ hàng</a>
										<a class="tg-btn" href="">Thanh toán</a>
									</div>
								</div>
								<a href="index.php?pages=user&action=order&userID=' . isset($_COOKIE['userID']) . '">Đơn mua</a>
							</div>
						</div>
					</div>
					<div class="tg-searchbox">
						<form class="tg-formtheme tg-formsearch" method="POST" action="">
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
								<button name="search-btn" type="submit"><i class="icon-magnifier"></i></button>
							</fieldset>

						</form>
						<?
						if (isset($_POST['search-btn'])) {
							$id = $_POST['cate'];
							$search = $_POST['keyword'];
							echo "<script>window.location.href = './?pages=user&action=products&id=$id&search=$search'</script>";
						};
						?>
						<style>
							#category-select {
								width: 20%;
								flex: 1;
								border: 1px solid #ccc;
								border-radius: 4px 0 0 4px;
								padding: 8px;
								height: 44px;
							}

							#search-input {
								width: 72%;
								flex: 1;
								border: 1px solid #ccc;
								border-radius: 0 0 0 0;
								margin-left: -4;
							}
						</style>
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
											<div class="tab-content tg-themetabcontent">
												<div role="tabpanel" class="tab-pane active" id="artandphotography">
													<ul>
														<li>
															<div class="tg-linkstitle">
																<h2>Hãng</h2>
															</div>
															<?
															$row1 = $product->category_type_select_all($category_id);
															foreach ($row1 as $ketqua1) {
																extract($ketqua1);
															?>
																<ul>
																	<li><a href=""><?= $type_name ?></a></li>
																</ul>
															<?
															}
															?>
														</li>
													</ul>
												</div>
											</div>
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

								<li class="">
									<a href="index.php?pages=user&action=introduce">Giới thiệu</a>
								</li>

								<li>
									<a href="#">Tin Tức Công Nghệ</a>
								</li>

								<li>
									<a href="index.php?pages=user&action=introduce">Liên Hệ</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<!--************************************
				Header End
		*************************************-->
<style>
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

.category{
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
		width: 300px;
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