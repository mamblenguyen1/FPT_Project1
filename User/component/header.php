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
						<figure><a href=""><img style="height:40px; width:40px" src="images/user1.jpg" alt="image description"></a></figure>
						<?
						if (isset($_COOKIE['userID'])) {
							if ($_COOKIE['role'] == 2) {
								echo '
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
							</div>
						</div>
					</div>
					<div class="tg-searchbox">
						<form class="tg-formtheme tg-formsearch">
							<fieldset>
								<input type="text" name="search" class="typeahead form-control" placeholder="Tìm kiếm sản phẩm. . .">
								<button type="submit"><i class="icon-magnifier"></i></button>
							</fieldset>
							<!-- <a href="">+ Advanced Search</a> -->
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
									<a href="">Tất cả danh mục</a>
									<div class="mega-menu">
										<ul class="tg-themetabnav" role="tablist">
											<li role="presentation" class="active">
												<a href="#artandphotography" aria-controls="artandphotography" role="tab" data-toggle="tab">Điện loại</a>
											</li>
											<li role="presentation">
												<a href="#biography" aria-controls="biography" role="tab" data-toggle="tab">Laptop</a>
											</li>
											<li role="presentation">
												<a href="#childrensbook" aria-controls="childrensbook" role="tab" data-toggle="tab">Phụ kiện</a>
											</li>
										</ul>
										<div class="tab-content tg-themetabcontent">
											<div role="tabpanel" class="tab-pane active" id="artandphotography">
												<ul>

													<li>
														<div class="tg-linkstitle">
															<h2>Art Forms</h2>
														</div>
														<ul>
															<li><a href="products.html">Consectetur adipisicing</a></li>
															<li><a href="products.html">Aelit sed do eiusmod</a></li>
															<li><a href="products.html">Tempor incididunt labore</a></li>
															<li><a href="products.html">Dolore magna aliqua</a></li>
															<li><a href="products.html">Ut enim ad minim</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
												</ul>
												<ul>
													<li>
														<figure><img src="images/img-01.png" alt="image description"></figure>
														<div class="tg-textbox">
															<h3>More Than<span>12,0657,53</span>Books Collection</h3>
															<div class="tg-description">
																<p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
															</div>
															<a class="tg-btn" href="products.html">view all</a>
														</div>
													</li>
												</ul>
											</div>
											<div role="tabpanel" class="tab-pane" id="biography">
												<ul>
													<li>
														<div class="tg-linkstitle">
															<h2>History</h2>
														</div>
														<ul>
															<li><a href="products.html">Veniam quis nostrud</a></li>
															<li><a href="products.html">Exercitation</a></li>
															<li><a href="products.html">Laboris nisi ut aliuip</a></li>
															<li><a href="products.html">Commodo conseat</a></li>
															<li><a href="products.html">Duis aute irure</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
													<li>
														<div class="tg-linkstitle">
															<h2>Architecture</h2>
														</div>
														<ul>
															<li><a href="products.html">Tough As Nails</a></li>
															<li><a href="products.html">Pro Grease Monkey</a></li>
															<li><a href="products.html">Building Memories</a></li>
															<li><a href="products.html">Bulldozer Boyz</a></li>
															<li><a href="products.html">Build Or Leave On Us</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
													<li>
														<div class="tg-linkstitle">
															<h2>Art Forms</h2>
														</div>
														<ul>
															<li><a href="products.html">Consectetur adipisicing</a></li>
															<li><a href="products.html">Aelit sed do eiusmod</a></li>
															<li><a href="products.html">Tempor incididunt labore</a></li>
															<li><a href="products.html">Dolore magna aliqua</a></li>
															<li><a href="products.html">Ut enim ad minim</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
												</ul>
												<ul>
													<li>
														<figure><img src="images/img-01.png" alt="image description"></figure>
														<div class="tg-textbox">
															<h3>More Than<span>12,0657,53</span>Books Collection</h3>
															<div class="tg-description">
																<p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
															</div>
															<a class="tg-btn" href="products.html">view all</a>
														</div>
													</li>
												</ul>
											</div>
											<div role="tabpanel" class="tab-pane" id="childrensbook">
												<ul>
													<li>
														<div class="tg-linkstitle">
															<h2>Architecture</h2>
														</div>
														<ul>
															<li><a href="products.html">Tough As Nails</a></li>
															<li><a href="products.html">Pro Grease Monkey</a></li>
															<li><a href="products.html">Building Memories</a></li>
															<li><a href="products.html">Bulldozer Boyz</a></li>
															<li><a href="products.html">Build Or Leave On Us</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
													<li>
														<div class="tg-linkstitle">
															<h2>Art Forms</h2>
														</div>
														<ul>
															<li><a href="products.html">Consectetur adipisicing</a></li>
															<li><a href="products.html">Aelit sed do eiusmod</a></li>
															<li><a href="products.html">Tempor incididunt labore</a></li>
															<li><a href="products.html">Dolore magna aliqua</a></li>
															<li><a href="products.html">Ut enim ad minim</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
													<li>
														<div class="tg-linkstitle">
															<h2>History</h2>
														</div>
														<ul>
															<li><a href="products.html">Veniam quis nostrud</a></li>
															<li><a href="products.html">Exercitation</a></li>
															<li><a href="products.html">Laboris nisi ut aliuip</a></li>
															<li><a href="products.html">Commodo conseat</a></li>
															<li><a href="products.html">Duis aute irure</a></li>
														</ul>
														<a class="tg-btnviewall" href="products.html">View All</a>
													</li>
												</ul>
												<ul>
													<li>
														<figure><img src="images/img-01.png" alt="image description"></figure>
														<div class="tg-textbox">
															<h3>More Than<span>12,0657,53</span>Books Collection</h3>
															<div class="tg-description">
																<p>Consectetur adipisicing elit sed doe eiusmod tempor incididunt laebore toloregna aliqua enim.</p>
															</div>
															<a class="tg-btn" href="products.html">view all</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</li>
								<li>
									<a href="index.php?pages=user&action=home">Trang chủ</a>
									<!-- <ul class="sub-menu">
										<li class="current-menu-item"><a href="index-2.html">Home V one</a></li>
										<li><a href="indexv2.html">Home V two</a></li>
										<li><a href="indexv3.html">Home V three</a></li>
									</ul> -->
								</li>
								<!-- <li class="menu-item-has-children">
									<a href="">Authors</a>
									<ul class="sub-menu">
										<li><a href="authors.html">Authors</a></li>
										<li><a href="authordetail.html">Author Detail</a></li>
									</ul>
								</li> -->
								<li><a href="index.php?pages=user&action=products">Sản phẩm</a></li>
								<li><a href="index.php?pages=user&action=introduce">Giới thiệu</a></li>
								<li class="menu-item-has-children">
									<a href="">Tin tức công nghệ</a>
									<ul class="sub-menu">
										<li><a href="newslist.html">News List</a></li>
										<li><a href="newsgrid.html">News Grid</a></li>
										<li><a href="newsdetail.html">News Detail</a></li>
									</ul>
								</li>
								<li><a href="index.php?pages=user&action=contact">Liên hệ</a></li>
								<!-- <li><a href="contactus.html">Liên hệ</a></li> -->
								<!-- <li class="menu-item-has-children current-menu-item">
									<a href=""><i class="icon-menu"></i></a>
									<ul class="sub-menu">
										<li class="menu-item-has-children">
											<a href="aboutus.html">Products</a>
											<ul class="sub-menu">
												<li><a href="products.html">Products</a></li>
												<li><a href="productdetail.html">Product Detail</a></li>
											</ul>
										</li>
										<li><a href="aboutus.html">About Us</a></li>
										<li><a href="404error.html">404 Error</a></li>
										<li><a href="comingsoon.html">Coming Soon</a></li>
									</ul>
								</li> -->
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