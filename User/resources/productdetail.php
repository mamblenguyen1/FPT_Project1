<?
ob_start();
include('user/component/header.php');

?>
<?
if (isset($_POST['deletecomment'])) {
	$product_id = $_GET['product_id'];
	$comment_detail = $_POST['detailCommentId'];
	$comment->deletedComment($comment_detail);
	echo '<script>alert("Đã ẩn bình luận ! ! !")</script>';
};


if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];
}
if (isset($_GET['category_id'])) {
	$category_id = $_GET['category_id'];
}

if (isset($_POST['editcomment'])) {
	if (isset($_GET['product_id'])) {
		$product_id = $_GET['product_id'];
	}
	if (isset($_GET['category_id'])) {
		$category_id = $_GET['category_id'];
	}
	$content = $_POST['content'];
	$comment_detail_id = $_POST['detailCommentId'];

	if (empty($content)) {
	} else {
		$comment->update_cmt($comment_detail_id, $content);
		echo '<script>alert("Chỉnh sửa bình luận thành công")</script>';
		echo '<script>window.location.href="index.php?pages=user&action=productdetail&category_id=' . $category_id . '&product_id=' . $product_id . '"</script>';
	}
}
// đếm view
setcookie('viewCount', 'viewed', time() + (10 * 60), '/');
if (isset($_COOKIE['viewCount'])) {
	echo '';
} else {
	setcookie('viewCount', 'viewed', time() + (10 * 60), '/');
	$update_view = "UPDATE products SET product_view = product_view + 1 WHERE product_id = $product_id";
	$result = $db->pdo_execute($update_view);
}



?>
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">

	<!-- <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="../images/background-login1.jpg">
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
	</div> -->
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
												<figure class="tg-featureimg">
													<img src="images/product/<? echo $product->all_product_category($category_id, $product_id, 'product_img') ?>.png" style="height: 250px; width: 250px;">
												</figure>
												<div class="tg-postbookcontent">
													<span class="tg-bookprice">
														<ins style="color: red;"><? echo number_format($product->sale($product->all_product_category($category_id, $product_id, 'product_price'), $product->all_product_category($category_id, $product_id, 'product_sale'))) ?><span>đ</span></ins>
														<del><?
																if ($product->all_product_category($category_id, $product_id, 'product_sale') > 0) {
																	echo number_format($product->all_product_category($category_id, $product_id, 'product_price'));
																	echo 'đ';
																} else {
																	echo '';
																} ?>
														</del>
													</span>
													<?
													if ($product->all_product_category($category_id, $product_id, 'product_sale') > 0) {
														echo '<span class="tg-bookwriter"><span>Tiết kiệm: </span>' . number_format(($product->all_product_category($category_id, $product_id, 'product_price')) - ($product->sale($product->all_product_category($category_id, $product_id, 'product_price'), $product->all_product_category($category_id, $product_id, 'product_sale')))) . ' đ</span>
';
													} else {
														echo '<div><br></div>';
													};
													?> <ul class="tg-delevrystock">
														<li><i class="icon-rocket"></i><span>Giao hàng toàn quốc</span></li>
														<li><i class="icon-checkmark-circle"></i><span>3 -5 ngày </span></li>
														<li><i class="icon-store"></i><span>Trạng thái: <em>Còn hàng</em></span></li>
													</ul>
													<div class="tg-quantityholder">
														<form action="index.php?pages=user&action=cart" method="post">
															<input type="hidden" value="<?= $product_id ?>" name="product_id">
															<a class="btn btn-primary" onclick="giamSoLuong()">-</a>
															<input type="number" id="hien-thi-gio-hang" name="qty">
															<a class="btn btn-primary" onclick="tangSoLuong()">+</a>
															<button type="submit" class="tg-btn tg-active tg-btn-lg" name="buy">Mua ngay </button>
														</form>
													</div>
													<script>
														let soLuongGioHang = 1;

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
												<span class="tg-bookwriter">Hãng: <a href="" style="color: var(--secondary-color);"><? echo $product->all_product_category($category_id, $product_id, 'type_name') ?></a></span>
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
																	if ($content == '') {
																		echo '<script>alert("Xin vui lòng nhập nội dung bình luận ! !")</script>';
																	} else {
																		if ($comment->DuplicateColumn($product_id)) {
																			$comment->addCommentDetails($product_id, $user_id, $content);
																			echo '<script>alert("Cảm ơn bạn đã để lại bình luận  ! !")</script>';
																		} else {
																			$comment->addComment($product_id, $user_id, $content);
																			echo '<script>alert("Cảm ơn bạn đã để lại bình luận ! !")</script>';
																		}
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
														<form action="" method="post">
															<input type="hidden" name="pid" value="' . $row['product_id'] . '" id="">
															<input type="hidden" name="detailCommentId" value="' . $row['comment_detail_id'] . '" id="">
															<div class="item-header btn btn-primary" class="editcmt"><i class="fa fa-edit"></i></div>
															<button class="btn btn-danger" name="deletecomment" type="submit"> <i class="fa fa-trash"></i></button>
															</form>
															<div class="item-content">
																<form action="" method="post">
																	<input type="hidden" name="pid" value="' . $row['product_id'] . '" id="">
																	<input type="hidden" name="detailCommentId" value="' . $row['comment_detail_id'] . '" id="">
																	<input type="text" style=" width : 500px" class="inp-cmt" name="content" value="' . $row['comment_content'] . '" id="">
																	<button type="submit" class="btn btn-primary" name="editcomment"><i class="fa fa-send-o"></i></button>
																	</form>
															</div>
	
													
														';
																		$stmt1  = $conn->prepare("SELECT * FROM comment_reply
														WHere comment_reply.comment_detail_id = $row[comment_detail_id]");
																		$stmt1->execute();
																		if ($stmt1->rowCount() > 0) {
																			foreach ($stmt1 as $row1) {
																				echo '
																			<div class="reply-comment">
																			<p> <i class="fa fa-reply"></i>
																			<strong>Trả lời từ ADMIN</strong>
																			</p>
																			<span>' . $row1['content'] . '</span>
																			</div>';
																			}
																		}
																		echo '
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
															if (isset($_COOKIE['userID'])) {
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
													<div class="comment-method">
														<div class="item1">
														';
																		if (($_COOKIE['userID']) == $row['user_id']) {
																			echo '
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
															';
																		}
																		$stmt1  = $conn->prepare("SELECT * FROM comment_reply
											WHere comment_reply.comment_detail_id = $row[comment_detail_id]");
																		$stmt1->execute();
																		if ($stmt1->rowCount() > 0) {
																			foreach ($stmt1 as $row1) {
																				echo '
																<div class="reply-comment">
																<p> <i class="fa fa-reply"></i>
																<strong>Trả lời từ ADMIN</strong>
																</p>
																<span>' . $row1['content'] . '</span>
																</div>';
																			}
																		}
																		echo '
															</div>
															</div>
														</div>
														<hr>
															';
																	}
																}
															} else {
																$stmt = $conn->prepare("SELECT * FROM comment , comment_detail, user
																Where comment.comment_id = comment_detail.comment_id
																AND
																comment_detail.user_id = user.user_id
																AND
																comment_detail.is_deleted = 1
																AND 
																comment.product_id = $product_id
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
																		$stmt1  = $conn->prepare("SELECT * FROM comment_reply
														WHere comment_reply.comment_detail_id = $row[comment_detail_id]");
																		$stmt1->execute();
																		if ($stmt1->rowCount() > 0) {
																			foreach ($stmt1 as $row1) {
																				echo '
																			<div class="reply-comment">
																			<p> <i class="fa fa-reply"></i>
																			<strong>Trả lời từ ADMIN</strong>
																			</p>
																			<span>' . $row1['content'] . '</span>
																			</div>';
																			}
																		}
																	}
																}
															}
															?>


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
									</div>
								</div>
							</div>
						</div>

						<?
						include('user/component/sidebar.php');
						?>
					</div>
				</div>

				<div class="container">
					<div class="row" id="slider-text">
						<div class="col-md-6">
							<h2>Các sản phẩm tương tự</h2>
						</div>
					</div>
				</div>

				<!-- Item slider-->
				<div class="container-fluid">

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="carousel carousel-showmanymoveone slide" id="itemslider">
								<div class="carousel-inner">

									<div class="item active">
										<div class="col-xs-12 col-sm-6 col-md-2">
											<a href="#">
												<img src="images/product/<? echo $product->all_product_category($_GET['category_id'], $_GET['product_id'], 'product_img') ?>.png" style="width:150px; height:200px">
											</a>
											<h4 class="text-center"><? echo $product->all_product_category($_GET['category_id'], $_GET['product_id'], 'product_name') ?></h4>
											<h5 class="text-center"><ins style="text-decoration:none"> <? echo $product->all_product_category($_GET['category_id'], $_GET['product_id'], 'product_sale') ?></ins>
												<br>
												<del><? echo $product->all_product_category($_GET['category_id'], $_GET['product_id'], 'product_price') ?></del>
											</h5>
										</div>
									</div>
									<?
                            $conn = $db->pdo_get_connection();
                            $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND
                                                    products.is_deleted = 1
                                                    ORDER BY products.product_view DESC LIMIT 10");
                            $stmt->execute();
                            if ($stmt->rowCount() > 0) {
                                foreach ($stmt as $row) {
                                    $sale = $row['product_sale'] > 0;
                                    $product_name_text = $product->substringtext($row['product_name'], 30);
                                    echo '
											<div class="item">
										<div class="col-xs-12 col-sm-6 col-md-2">
											<a href="./?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . '">
												<img src="images/product/' . $row['product_img'] . '.png" style="width:150px; height:200px">
												' . ($sale ? "<span class='saleprice'>-$row[product_sale]%</span>" : "") . '
											</a>
											<h4 class="text-center">' .  $row['category_name'] . '</h4>
											<h5 class="text-center"><ins style="text-decoration:none">' . number_format($product->sale($row['product_price'], $row['product_sale'])) . ' đ</ins>
												<br>
												<del>' . ($sale ? "$row[product_price] đ" : "<div><br></div>") . '</del>
											</h5>
										</div>
									</div>
											';
									}
								};
									?>
								</div>

								<div id="slider-control">
									<a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
									<a class="right carousel-control" href="#itemslider" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?
				include('User/component/recommend_product_slider.php');
				?>


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
	.text-center {
		color: var(--secondary-color);
	}

	.col-md-6 h2 {
		color: var(--secondary-color);
	}

	.comment-method {
		padding: 10px 0;
	}

	.reply-comment {
		padding: 5px 30px;
		color: var(--secondary-color);
	}

	.reply-comment span {
		padding: 5px;

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
</script>
<?
include('user/component/footer.php');
ob_end_flush();
?>