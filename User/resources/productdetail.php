<?
include('user/component/header.php');
?>
<?

if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];
	echo $product_id;
}
if (isset($_GET['category_id'])) {
	$category_id = $_GET['category_id'];
	echo $category_id;
}

?>
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">

	<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="../images/background-login1.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="tg-innerbannercontent">
						<h1>Chi tiết sản phẩm</h1>
						<ol class="tg-breadcrumb">
							<li><a href="">Trang chủ</a></li>
							<li><a href="">Sản phẩm</a></li>
							<li class="tg-active">Chi tiết sản phẩm</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<main id="tg-main" class="tg-main tg-haslayout">
		<div class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-twocolumns" class="tg-twocolumns">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
							<div id="tg-content" class="tg-content">
								<div class="tg-productdetail">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
											<div class="tg-postbook">
												<figure class="tg-featureimg"><img src="../images/iphone.jpg" alt="image description"></figure>
												<div class="tg-postbookcontent">
													<span class="tg-bookprice">
														<ins style="color: red;"><? echo number_format($product->all_product_category($category_id, $product_id, 'product_price')) ?><span>đ</span></ins>
														<del><? echo number_format($product->all_product_category($category_id, $product_id, 'product_sale')) ?><span>đ</span></del>
													</span>
													<span class="tg-bookwriter"><span>Tiết kiệm :</span><? echo number_format(($product->all_product_category($category_id, $product_id, 'product_price')) - ($product->all_product_category($category_id, $product_id, 'product_sale'))) ?></span>
													<ul class="tg-delevrystock">
														<li><i class="icon-rocket"></i><span>Giao hàng toàn quốc</span></li>
														<li><i class="icon-checkmark-circle"></i><span>3 -5 ngày </span></li>
														<li><i class="icon-store"></i><span>Trạng thái: <em>Còn hàng</em></span></li>
													</ul>
													<div class="tg-quantityholder">
														<form action="index.php?pages=user&action=cart" method="post">
															<a class="btn btn-primary" onclick="giamSoLuong()">-</a>
															<input type="number" id="hien-thi-gio-hang" name="qty">
															<a class="btn btn-primary" onclick="tangSoLuong()">+</a>
															<button type="submit" class="tg-btn tg-active tg-btn-lg" name="buy">Thêm vào giỏ hàng</button>
														</form>

													</div>
													<button class="tg-btnaddtowishlist" href="">
														<span>Yêu thích</span>
													</button>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
											<div class="tg-productcontent">
												<ul class="tg-bookscategories">
													<li><a href=""><? echo $product->all_product_category($category_id, $product_id, 'category_name') ?></a></li>
												</ul>
												<div class="tg-themetagbox"><span class="tg-themetag">Sale</span></div>
												<div class="tg-booktitle">
													<h3><? echo $product->all_product_category($category_id, $product_id, 'product_name') ?></h3>
												</div>
												<span class="tg-bookwriter">Hãng: <a href=""><? echo $product->all_product_category($category_id, $product_id, 'type_name') ?></a></span>
												<span class="tg-stars"><span></span></span>
												<span class="tg-addreviews"><a href="">Đánh giá</a></span>
												<div class="tg-share">
													<span>Share:</span>
													<ul class="tg-socialicons">
														<li class="tg-facebook"><a href=""><i class="fa fa-facebook"></i></a></li>
														<li class="tg-twitter"><a href=""><i class="fa fa-twitter"></i></a></li>
														<li class="tg-linkedin"><a href=""><i class="fa fa-linkedin"></i></a></li>
														<li class="tg-googleplus"><a href=""><i class="fa fa-google-plus"></i></a></li>
														<li class="tg-rss"><a href=""><i class="fa fa-rss"></i></a></li>
													</ul>
												</div>
												<div class="tg-description">
													<p>
														<? echo $product->substringtext($product->all_product_category($category_id, $product_id, 'product_title'), 100)  ?>
													</p>
												</div>
												<div class="tg-sectionhead">
													<h2>Thông tin chi tiết</h2>
												</div>
												<?
												if ($category_id == 1) {
													$conn = $db->pdo_get_connection();
													$stmt = $conn->prepare("SELECT * FROM phone
													 WHERE is_deleted = 1
													 AND product_id = $product_id
													 ");
													$stmt->execute();
													if ($stmt->rowCount() > 0) {
														foreach ($stmt as $row) {
															echo '
															<ul class="tg-productinfo">
															<li><span>Màn hình:</span><span>' . $row['product_screen'] . '</span></li>
															<li><span>Camera sau:</span><span>' . $row['product_backcam'] . '</span></li>
															<li><span>Camera trước:</span><span>' . $row['product_frontcam'] . '</span></li>
															<li><span>Chip:</span><span>' . $row['product_chip'] . '</span></li>
															<li><span>RAM:</span><span>' . $row['product_ram'] . '</span></li>
															<li><span>Dung lượng lưu trữ:</span><span>' . $row['product_storge'] . '</span></li>
														</ul>
														';
														}
													}
												} else if ($category_id == 2) {
													$conn = $db->pdo_get_connection();
													$stmt = $conn->prepare("SELECT * FROM laptop
													 WHERE is_deleted = 1
													 AND product_id = $product_id
													 ");
													$stmt->execute();
													if ($stmt->rowCount() > 0) {
														foreach ($stmt as $row) {
															echo '
															<ul class="tg-productinfo">
															<li><span>Màn hình:</span><span>' . $row['product_screen'] . '</span></li>
															<li><span>Card Đồ họa:</span><span>' . $row['product_graphic'] . '</span></li>
															<li><span>CPU :</span><span>' . $row['product_CPU'] . '</span></li>
															<li><span>RAM:</span><span>' . $row['product_ram'] . '</span></li>
															<li><span>Dung lượng lưu trữ:</span><span>' . $row['product_storge'] . '</span></li>
														</ul>
														';
														}
													}
												} else {
													if ($product->all_product_category($category_id, $product_id, 'is_wireless') == 1) {
														$conn = $db->pdo_get_connection();
														$stmt = $conn->prepare("SELECT * FROM wired
														 WHERE is_deleted = 1
														 AND product_id = $product_id
														 ");
														$stmt->execute();
														if ($stmt->rowCount() > 0) {
															foreach ($stmt as $row) {
																echo '
																<ul class="tg-productinfo">
																<li><span>Độ dài dây :</span><span>' . $row['product_length'] . '</span></li>
																<li><span>Cổng kết nối :</span><span>' . $row['product_port'] . '</span></li>
																<li><span>Trọng lượng :</span><span>' . $row['product_weight'] . '</span></li>
																<li><span>Phụ kiện đi kèm:</span><span>' . $row['product_included'] . '</span></li>
															</ul>
															';
															}
														}
													} else {
														$conn = $db->pdo_get_connection();
														$stmt = $conn->prepare("SELECT * FROM wireless
														 WHERE is_deleted = 1
														 AND product_id = $product_id
														 ");
														$stmt->execute();
														if ($stmt->rowCount() > 0) {
															foreach ($stmt as $row) {
																echo '
																<ul class="tg-productinfo">
																<li><span>Phạm vi kết nối  :</span><span>' . $row['product_range'] . '</span></li>
																<li><span>Cổng kết nối :</span><span>' . $row['product_port'] . '</span></li>
																<li><span>Trọng lượng :</span><span>' . $row['product_weight'] . '</span></li>
																<li><span>Dung lượng PIN:</span><span>' . $row['product_capacity'] . '</span></li>
																<li><span>Thời gian sạc đầy:</span><span>' . $row['product_charge_time'] . '</span></li>
																<li><span>Thời gian sử dụng:</span><span>' . $row['product_use_time'] . '</span></li>
																<li><span>Phụ kiện đi kèm:</span><span>' . $row['product_included'] . '</span></li>

															</ul>
															';
															}
														}
													}
												}
												?>




											</div>
										</div>
										<br>

										<div class="tg-productdescription">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="tg-sectionhead">
													<h2 style="padding: 20px 0; font-weight: bold;">Mô tả và nhận xét sản phẩm</h2>
												</div>
												<ul class="tg-themetabs" role="tablist">
													<li role="presentation" class="active"><a href="#description" data-toggle="tab">Bình luận</a></li>
													<li role="presentation"><a href="#review" data-toggle="tab">Mô tả</a></li>
												</ul>
												<div class="tg-tab-content tab-content">
													<div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
														<div class="tg-description">
															<!-- <form action="" method="post">
																<input type="text" name="" id="">
																<button type="submit">Gửi bình luận</button>
															</form> -->
															<!-- comment -->
															<div class="">Nhận xét</div>
															<form class="review-form" method="post">
																<div class="form-group">
																</div>
																<div class="form-group">
																	<label>Your message</label>
																	<textarea class="form-control" rows="10" name="noi_dung"></textarea>
																</div>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<input type="hidden" class="form-control" placeholder="Name" name="ma_kh" value="<?= $_COOKIE['user'] ?>">
																			<input type="hidden" name="ma_hh" value="<?= $ID ?>">
																		</div>
																	</div>
																</div>
																<button class="round-black-btn btn btn-primary" name="binh_luan">Gửi bình luận</button>
															</form>
															<!-- thêm bình luận -->

															<p></p>
															<h6>Tất cả comment:</h6>
															<div class="comment">
																<div class="comment-info">
																	<p> <strong>Nguyễn Minh Quang : </strong>
																	</p>
																	<p>Cmt của user có thể sửa hoặc xóa</p>
																</div>
																<br>
																<div class="comment-method">
																	<div class="item1">
																		<div class="item-header btn btn-primary" class="editcmt">Sửa</div>
																		<button class="btn btn-danger"> Xóa</button>
																		<div class="item-content">
																			<form action="componant/editcmt.php" method="post">
																				<input type="hidden" name="pid" value="' . $row['sachma'] . '" id="">
																				<input type="hidden" name="detailCommentId" value="' . $row['detailCommentId'] . '" id="">
																				<input type="text" class="inp-cmt" name="content" value="' . $row['content'] . '" id="">
																				<button type="submit" class="btn-cmt" name="edituser">Sửa Bình Luận</button>
																			</form>
																		</div>

																	</div>
																</div>
															</div>
															<div class="comment">
																<div class="comment-info">
																	<p> <strong>Nguyễn Minh Quang 1: </strong>
																	</p>
																	<p>cmt k phải của user , có thể trả lời</p>
																	<div class="replay-cmt">
																		<p> <strong>Tài khoản trả lời: </strong>
																		</p>
																		<p>trả lời của user khác</p>
																	</div>

																</div>
																<br>
																<div class="item1">
																	<div class="item-header btn btn-primary" class="editcmt">Trả lời</div>
																	<div class="item-content">
																		<form action="componant/editcmt.php" method="post">
																			<input type="hidden" name="pid" value="' . $row['sachma'] . '" id="">
																			<input type="hidden" name="detailCommentId" value="' . $row['detailCommentId'] . '" id="">
																			<input type="text" class="inp-cmt" name="content" value="' . $row['content'] . '" id="">
																			<button type="submit" class="btn-cmt" name="edituser">Sửa Bình Luận</button>
																		</form>
																	</div>
																</div>
															</div>

														</div>
													</div>
													<div role="tabpanel" class="tg-tab-pane tab-pane" id="review">
														<div class="tg-description">
															<p>
																<?
																echo $product->all_product_category($category_id, $product_id, 'product_title');
																?>
															</p>
															<img src="../images/iphone.jpg" alt="">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tg-relatedproducts">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="tg-sectionhead">
													<h2><span>Gợi ý sản phẩm</span>Có thể bạn sẽ biết</h2>
													<a class="tg-btn" href="">Xem tất cả</a>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">
													<div class="item">
														<div class="tg-postbook">
															<figure class="tg-featureimg">
																<div class="tg-bookimg">
																	<div class="tg-frontcover"><img src="../images/iphone.jpg" alt="image description"></div>
																	<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																</div>
																<a class="tg-btnaddtowishlist" href="">
																	<i class="icon-heart"></i>
																	<span>Yêu thích</span>
																</a>
															</figure>
															<div class="tg-postbookcontent">
																<ul class="tg-bookscategories">
																	<li><a href="">Điện thoại</a></li>
																	<li><a href="">APPLE</a></li>
																</ul>
																<div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
																<div class="tg-booktitle">
																	<h3><a href="">Iphone 15 Promax</a></h3>
																</div>
																<span class="tg-bookwriter">By: <a href="">Angela Gunning</a></span>
																<span class="tg-stars"><span></span></span>
																<span class="tg-bookprice">
																	<ins>$25.18</ins>
																	<del>$27.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo" href="">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="tg-postbook">
															<figure class="tg-featureimg">
																<div class="tg-bookimg">
																	<div class="tg-frontcover"><img src="../images/iphone.jpg" alt="image description"></div>
																	<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																</div>
																<a class="tg-btnaddtowishlist" href="">
																	<i class="icon-heart"></i>
																	<span>Yêu thích</span>
																</a>
															</figure>
															<div class="tg-postbookcontent">
																<ul class="tg-bookscategories">
																	<li><a href="">Điện thoại</a></li>
																	<li><a href="">APPLE</a></li>
																</ul>
																<div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
																<div class="tg-booktitle">
																	<h3><a href="">Iphone 15 Promax</a></h3>
																</div>
																<span class="tg-bookwriter">By: <a href="">Angela Gunning</a></span>
																<span class="tg-stars"><span></span></span>
																<span class="tg-bookprice">
																	<ins>$25.18</ins>
																	<del>$27.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo" href="">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="tg-postbook">
															<figure class="tg-featureimg">
																<div class="tg-bookimg">
																	<div class="tg-frontcover"><img src="../images/iphone.jpg" alt="image description"></div>
																	<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																</div>
																<a class="tg-btnaddtowishlist" href="">
																	<i class="icon-heart"></i>
																	<span>Yêu thích</span>
																</a>
															</figure>
															<div class="tg-postbookcontent">
																<ul class="tg-bookscategories">
																	<li><a href="">Điện thoại</a></li>
																	<li><a href="">APPLE</a></li>
																</ul>
																<div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
																<div class="tg-booktitle">
																	<h3><a href="">Iphone 15 Promax</a></h3>
																</div>
																<span class="tg-bookwriter">By: <a href="">Angela Gunning</a></span>
																<span class="tg-stars"><span></span></span>
																<span class="tg-bookprice">
																	<ins>$25.18</ins>
																	<del>$27.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo" href="">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="tg-postbook">
															<figure class="tg-featureimg">
																<div class="tg-bookimg">
																	<div class="tg-frontcover"><img src="../images/iphone.jpg" alt="image description"></div>
																	<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																</div>
																<a class="tg-btnaddtowishlist" href="">
																	<i class="icon-heart"></i>
																	<span>Yêu thích</span>
																</a>
															</figure>
															<div class="tg-postbookcontent">
																<ul class="tg-bookscategories">
																	<li><a href="">Điện thoại</a></li>
																	<li><a href="">APPLE</a></li>
																</ul>
																<div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
																<div class="tg-booktitle">
																	<h3><a href="">Iphone 15 Promax</a></h3>
																</div>
																<span class="tg-bookwriter">By: <a href="">Angela Gunning</a></span>
																<span class="tg-stars"><span></span></span>
																<span class="tg-bookprice">
																	<ins>$25.18</ins>
																	<del>$27.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo" href="">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="tg-postbook">
															<figure class="tg-featureimg">
																<div class="tg-bookimg">
																	<div class="tg-frontcover"><img src="../images/iphone.jpg" alt="image description"></div>
																	<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																</div>
																<a class="tg-btnaddtowishlist" href="">
																	<i class="icon-heart"></i>
																	<span>Yêu thích</span>
																</a>
															</figure>
															<div class="tg-postbookcontent">
																<ul class="tg-bookscategories">
																	<li><a href="">Điện thoại</a></li>
																	<li><a href="">APPLE</a></li>
																</ul>
																<div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
																<div class="tg-booktitle">
																	<h3><a href="">Iphone 15 Promax</a></h3>
																</div>
																<span class="tg-bookwriter">By: <a href="">Angela Gunning</a></span>
																<span class="tg-stars"><span></span></span>
																<span class="tg-bookprice">
																	<ins>$25.18</ins>
																	<del>$27.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo" href="">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
													<div class="item">
														<div class="tg-postbook">
															<figure class="tg-featureimg">
																<div class="tg-bookimg">
																	<div class="tg-frontcover"><img src="../images/iphone.jpg" alt="image description"></div>
																	<div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div>
																</div>
																<a class="tg-btnaddtowishlist" href="">
																	<i class="icon-heart"></i>
																	<span>Yêu thích</span>
																</a>
															</figure>
															<div class="tg-postbookcontent">
																<ul class="tg-bookscategories">
																	<li><a href="">Điện thoại</a></li>
																	<li><a href="">APPLE</a></li>
																</ul>
																<div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
																<div class="tg-booktitle">
																	<h3><a href="">Iphone 15 Promax</a></h3>
																</div>
																<span class="tg-bookwriter">By: <a href="">Angela Gunning</a></span>
																<span class="tg-stars"><span></span></span>
																<span class="tg-bookprice">
																	<ins>$25.18</ins>
																	<del>$27.20</del>
																</span>
																<a class="tg-btn tg-btnstyletwo" href="">
																	<i class="fa fa-shopping-basket"></i>
																	<em>Thêm giỏ hàng</em>
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?
						include('user/component/sidebar.php');
						?>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
					News Grid End
			*************************************-->
	</main>
	<!--************************************
				Main End
		*************************************-->

</div>
<style>
	.comment-method {
		padding: 10px 0;
	}

	.tg-description p {
		box-sizing: border-box;
	}

	.comment {
		display: block;
	}

	.item-content {
		display: none;
	}

	.replay-cmt {
		padding: 0 30px;
	}
</style>
<script>
	var items = document.querySelectorAll('.item1');

	items.forEach(function(item) {
		var header = item.querySelector('.item-header');
		var content = item.querySelector('.item-content');

		header.addEventListener('click', function() {
			content.classList.toggle('active');

			if (content.classList.contains('active')) {
				content.style.display = 'block';
			} else {
				content.style.display = 'none';
			}
		});
	});
	// Khởi tạo số lượng trong giỏ hàng
	let soLuongGioHang = 0;

	// Hàm tăng số lượng
	function tangSoLuong() {
		soLuongGioHang++;
		capNhatGioHang();
	}

	// Hàm giảm số lượng
	function giamSoLuong() {
		if (soLuongGioHang > 0) {
			soLuongGioHang--;
			capNhatGioHang();
		}
	}

	// Hàm cập nhật giỏ hàng trên giao diện
	function capNhatGioHang() {
		let hienThiGioHang = document.getElementById('hien-thi-gio-hang');
		hienThiGioHang.value = soLuongGioHang;
	}

	// Gọi hàm cập nhật giỏ hàng khi tải trang
	document.addEventListener('DOMContentLoaded', function() {
		capNhatGioHang();
	});
</script>
<?
include('user/component/footer.php');
?>