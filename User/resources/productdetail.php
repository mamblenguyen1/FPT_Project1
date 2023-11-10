<?
include('user/component/header.php');
?>
<?

if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];
}
if (isset($_GET['category_id'])) {
	$category_id = $_GET['category_id'];
}




// đếm view
$user_id = isset($_COOKIE['userID']) ? $_COOKIE['userID'] : null;
if ($product->count_view($user_id, $product_id) == 0) {
	$db = new connect();
	$sql_insert = "INSERT INTO user_views (user_id, product_id) VALUES ($user_id, $product_id)";
	$result = $db->pdo_execute($sql_insert);
	if ($product->count_view($user_id, $product_id) == 1) {
		$update_view = "UPDATE products SET product_view = product_view + 1 WHERE product_id = $product_id";
		$result = $db->pdo_execute($update_view);
	}
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
													Mô tả ngắn sản phẩm
													<p>
														<? echo $product->substringtext($product->all_product_category($category_id, $product_id, 'product_short_description'), 100)  ?>
													</p>
												</div>
												<div class="tg-sectionhead">
													<h2>Thông tin chi tiết</h2>
												</div>
												<ul class="tg-productinfo">
													<?
													echo ($product->all_product_category($category_id, $product_id, 'product_description'));

													?>


												</ul>

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
															<?
															// if (isset($_POST['AddComment'])) {
															// 	if (isset($_COOKIE['userID'])) {
															// 		$product_id = $_POST['product_id'];
															// 		$user_id = $_COOKIE['userID'];
															// 		$content = $_COOKIE['content'];





															if (isset($_POST['AddComment'])) {
																if (isset($_COOKIE['userID'])) {
																	$product_id = $_POST['product_id'];
																	$user_id = $_COOKIE['userID'];
																	$content = $_POST['content'];
																	if ($comment->DuplicateColumn($product_id)) {
																		$comment->addCommentDetails($product_id, $user_id, $content);
																		echo '<script>alert("Cảm ơn bạn đã để lại bình luận trùng ! !")</script>';
																	} else {
																		$comment->addComment($product_id, $user_id, $content);
																		echo '<script>alert("Cảm ơn bạn đã để lại bình luận ! !")</script>';
																	}
																} else {
																	echo '<script>alert("Xin vui lòng đăng nhập để bình luận !!")</script>';
																}
															}
															?>

															<form class="review-form" method="post">
																<div class="form-group p-20">
																	<label>Your message</label>
																	<textarea class="form-control" rows="10" name="content"></textarea>
																</div>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<input type="hidden" name="product_id" value="<?= $product->all_product_category($category_id, $product_id, 'product_id') ?>">
																		</div>
																	</div>
																</div>
																<button class="round-black-btn btn btn-primary" name="AddComment">Gửi bình luận</button>
															</form>
															<!-- thêm bình luận -->

															<p></p>
															<h4>Tất cả comment:</h4>
															<?
															if (isset($_COOKIE['userID'])) {
																$conn = $db->pdo_get_connection();
																$stmt = $conn->prepare("SELECT * FROM comment , comment_detail, user
																Where comment.comment_id = comment_detail.comment_id
																AND
																comment_detail.user_id = user.user_id
																AND
																comment_detail.is_deleted = 1
																AND 
																comment.product_id = $product_id
																AND 
																user.user_id = ($_COOKIE[userID]) 
																");
																$stmt->execute();
																if ($stmt->rowCount() > 0) {
																	foreach ($stmt as $row) {
																		echo '
													<div class="comment">
													<div class="comment-info">
													<div class="user_cmt">
													<p> <strong>' . $row['user_name'] . ': </strong>
													</p>
													<p>' . $row['comment_date'] . '</p>
												</div>
	
														<p>' . $row['comment_content'] . ' </p>
													</div>
													<br>
													<div class="comment-method">
														<div class="item1">
															<div class="item-header btn btn-primary" class="editcmt"><i class="fa fa-edit"></i></div>
															<button class="btn btn-danger"> <i class="fa fa-trash"></i></button>
															<div class="item-content">
																<form action="" method="post">
																	<input type="hidden" name="pid" value="' . $row['product_id'] . '" id="">
																	<input type="hidden" name="detailCommentId" value="' . $row['comment_detail_id'] . '" id="">
																	<input type="text" style=" width : 500px" class="inp-cmt" name="content" value="' . $row['comment_content'] . '" id="">
																	<button type="submit" class="btn btn-primary" name="editcomment"><i class="fa fa-send-o"></i></button>
																	</form>
															</div>
	
														</div>
													</div>
												</div>
												<hr>
														';
																	}
																}
															} else {
															};
															$conn = $db->pdo_get_connection();
															$stmt = $conn->prepare("SELECT * FROM comment , comment_detail, user
																Where comment.comment_id = comment_detail.comment_id
																AND
																comment_detail.user_id = user.user_id
																AND
																comment_detail.is_deleted = 1
																AND 
																comment.product_id = $product_id
																AND 
																user.user_id <>($_COOKIE[userID]) 
																");
															$stmt->execute();
															if ($stmt->rowCount() > 0) {
																foreach ($stmt as $row) {
																	echo '
													<div class="comment">
													<div class="comment-info">
													<div class="user_cmt">
													<p> <strong>' . $row['user_name'] . ': </strong>
													</p>
													<p>' . $row['comment_date'] . '</p>
												</div>
	
														<p>' . $row['comment_content'] . ' </p>
													</div>
													<br>
												
												</div>
												<hr>
														';
																}
															}



															?>

															<div class="comment">
																<div class="comment-info">
																	<div class="user_cmt">
																		<p> <strong>Nguyễn Minh Quang 1: </strong>
																		</p>
																		<p>23 - 11 - 2023</p>
																	</div>

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
																echo $product->all_product_category($category_id, $product_id, 'product_description');
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

	.user_cmt {
		display: flex;
		justify-content: space-between;
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