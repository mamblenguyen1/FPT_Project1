<?
include('user/component/header.php');
?>

<body class="tg-home tg-homeone">
    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <section class="tg-bglight tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-featureditm">
                        <?
                        $conn = $db->pdo_get_connection();
                        $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                        type.type_id = products.type_id
                        AND 
                        category.category_id = products.category_id
                        AND 
                        products.product_id IN (
                        SELECT product_id
                        FROM order_detail
                        WHERE order_detail.order_status_id = 2
                        GROUP BY product_id
                        ORDER BY COUNT(product_id) DESC
                        )
                            LIMIT 1
                        
                        ;");
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt as $row) {
                                $sale = $row['product_sale'] > 0;
                                echo '
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                            <figure><img src="images/product/' . $row['product_img'] . '.png"></figure>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="tg-featureditmcontent">
                                <div class="tg-themetagbox"><span class="tg-themetag">Mới</span></div>
                                <div class="tg-booktitle">
                                    <h3><a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . '">' . $row['product_name'] . '</a></h3>
                                </div>
                                <span class="tg-bookwriter">Hãng: ' . $row['type_name'] . '</span>
                                <div class="tg-priceandbtn">
                                    <span class="tg-bookprice">
                                        <ins>Giá : ' . number_format($product->sale($row['product_price'], $row['product_sale'])) . ' đ</ins>
                                        <del>' . ($sale ? number_format($row['product_price']) . ' đ' : '<div><br></div>') . '</del>
                                    </span>
                                    <form action="index.php?pages=user&action=cart" method="post">
                                    <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                                    <input type="hidden" name="qty" value="1">
                                    <button style="width: 60%  " type="submit" class="tg-btn tg-btnstyletwo" name="addoneproduct" ><i class="fa fa-shopping-basket"></i>
                                        Mua ngay</button>
                                </form>
                                </div>
                            </div>
                        </div>
                        ';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Các</span>Sản phẩm được xem nhiều nhất</h2>
                            <a class="tg-btn" href="index.php?pages=user&action=products">Xem tất cả sản phẩm</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
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
                                <div class="tg-postbook">
                                ' . ($sale ? "<span class='saleprice'>-$row[product_sale]%</span>" : "") . '
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img style="width:175.55;height:175.55px;" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                        <div class="tg-backcover"><img style="width:175.55;height: 175.55;" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                        </div>
                                        
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">' .  $row['category_name'] . '</a></li>
                                            <li><a href="javascript:void(0);">' . $row['type_name'] . '</a></li>
                                        </ul>
                                        <div class="tg-themetagbox"><span class="tg-themetag">Hot</span></div>
                                        <div class="tg-booktitle">
                                        <h3>
                                        <a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . ' ">' . $product_name_text . '</a> ' . $product->substringLength($row['product_name'], 22) . '
                                        </h3>
                                        </div>
                                        <span class="tg-bookwriter">Hãng: <a href="javascript:void(0);">' .  $row['type_name'] . '</a></span>
                                        <span class="tg-bookprice">
                                        <ins>' . number_format($product->sale($row['product_price'], $row['product_sale'])) . 'đ</ins>
                                        <br>
                                        <del>' . ($sale ? number_format($row['product_price']) . ' đ' : '<div><br></div>') . '</del>
                                        </span>
                                        <form action="index.php?pages=user&action=cart" method="post">
                                        <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                                        <input type="hidden" name="qty" value="1">
                                        <button style="width: 100%  " type="submit" class="tg-btn tg-btnstyletwo" name="addoneproduct" ><i class="fa fa-shopping-basket"></i>
                                            Mua ngay</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                                    ';
                                }
                            };
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-newrelease">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="tg-sectionhead">
                                <h2><span>Trải nghiệm cảm giác mới</span>Sản phẩm vừa ra mắt</h2>
                            </div>
                            <div class="tg-description">
                                <p>Sản phẩm của chúng tôi không chỉ là một sản phẩm công nghệ, mà còn là một
                                    trợ thủ đắc lực trong cuộc sống hàng ngày. Bất kể bạn là một người
                                    yêu công nghệ, một doanh nhân hay một người yêu thể thao, sản phẩm của tôi
                                    sẽ làm thay đổi cách bạn làm việc và giải trí. Đừng bỏ lỡ cơ hội sở hữu sản
                                    phẩm tuyệt vời này. Hãy truy cập vào sản phẩm để biết
                                    thêm thông tin chi tiết và giá cả. Sẽ thay đổi cuộc sống của bạn,
                                    và chúng tôi rất tự hào về điều đó.</p>
                            </div>
                            <div class="tg-btns">
                                <a class="tg-btn tg-active" href="./index.php?pages=user&action=products">Xem Tất Cả</a>
                                <a class="tg-btn" href="javascript:void(0);">Thêm</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="tg-newreleasebooks">
                                    <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND
                                                    products.is_deleted = 1
                                                    ORDER BY products.product_id DESC LIMIT 3");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {

                                            $product_name_text = $product->substringtext($row['product_name'], 22);
                                            echo '
                                    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">

                                                    <div class="tg-frontcover"><img style="width:175.55;height:175.55px" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                                    <div class="tg-backcover"><img style="width:175.55;height:175.55px" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                                </div>

                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <ul class="tg-bookscategories">
                                                    <li><a href="javascript:void(0);">' . $row['category_name'] . '</a></li>
                                                    <li><a href="javascript:void(0);">' . $row['type_name'] . '</a></li>
                                                </ul>
                                                <div class="tg-booktitle">

                                                    <h3><a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . ' ">' . $product_name_text . '</a></h3>
                                                </div>
                                                <span class="tg-bookwriter">Hãng: <a href="javascript:void(0);">' .  $row['type_name'] . '</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                        }
                                    };
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/image.png">
            <div class="tg-sectionspace tg-collectioncount tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-collectioncounters" class="tg-collectioncounters">
                            <div class="tg-collectioncounter tg-drama">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-bubble"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Bình luận</h2>
                                    <h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-horror">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart-pulse"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Dịch vụ</h2>
                                    <h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-romance">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Lượt yêu thích</h2>
                                    <h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-fashion">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-star"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Đánh giá</h2>
                                    <h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-16 col-sm-16 col-md-16 col-lg-16">
                        <div class="tg-sectionhead">
                            <h2><span>Top 5 </span>Sản phẩm bán chạy</h2>
                            <a class="tg-btn" href="index.php?pages=user&action=products" style="margin-right: 2%;">Xem Tất Cả</a>
                        </div>
                    </div>
                    <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                        <?
                        $conn = $db->pdo_get_connection();
                        $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                        type.type_id = products.type_id
                        AND 
                        category.category_id = products.category_id
                        AND 
                        products.product_id IN (
                        SELECT product_id
                        FROM order_detail
                        WHERE order_detail.order_status_id = 2
                        GROUP BY product_id
                        ORDER BY COUNT(product_id) DESC
                        )
                            LIMIT 5
                        
                        ;");
                        $stmt->execute();
                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt as $row) {
                                echo '
                        <div class="item" >
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg" style="background: white;">
                                        <div class="tg-frontcover"><img style="width:175.55;height:175.55px" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        <div class="tg-description">
                                            <p>' . $row['product_short_description'] . '</p>
                                        </div>
                                        <strong class="tg-bookpage">Danh mục : ' . $row['category_name'] . '</strong>
                                        <strong class="tg-bookcategory">Hãng :' . $row['type_name'] . ' </strong>
                                        <strong class="tg-bookprice">Giá : ' . number_format($product->sale($row['product_price'], $row['product_sale'])) . ' đ</strong>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . '">' . $row['product_name'] . '</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">Số lượng đã bán: <a href="javascript:void(0);">' . $order->count_order_by_id($row['product_id']) . '</a></span>
                                    <form action="index.php?pages=user&action=cart" method="post">
                                    <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                                    <input type="hidden" name="qty" value="1">
                                    <button type="submit" class="tg-btn tg-btnstyletwo" name="addoneproduct" ><i class="fa fa-shopping-basket"></i>
                                        Thêm giỏ hàng</button>
                                </form>
                                </div>
                            </div>
                        </div>
                                        ';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="https://cutewallpaper.org/28/coffee-and-laptop-wallpaper/146069268.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                            <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
                                <div class="item tg-testimonial">
                                    <figure><img src="images/user/1.jpg" alt="image description" style="width: 100px; height: 100px;"></figure>
                                    <blockquote style="color: white;"><q>"Chúng tôi luôn mang đến những sản phẩm mới nhất, chất lượng nhất đến khách hàng."</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Nguyễn Minh Quang</h3>
                                    </div>
                                </div>

                                <div class="item tg-testimonial">
                                    <figure><img src="images/user/4.jpg" alt="image description" style="width: 100px; height: 100px;"></figure>
                                    <blockquote style="color: white;"><q>"Đây không chỉ là nơi để bán sản phẩm, mà còn là cơ hội để xây dựng mối quan hệ với khách hàng."</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Nguyễn Văn Đặng</h3>
                                    </div>
                                </div>

                                <div class="item tg-testimonial">
                                    <figure><img src="images/user/2.jpg" alt="image description" style="width: 100px; height: 100px;"></figure>
                                    <blockquote style="color: white;"><q>"Thứ bạn cần chúng tôi có, thứ bạn có tôi không có."</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Quách Thanh Tú</h3>
                                    </div>
                                </div>

                                <div class="item tg-testimonial">
                                    <figure><img src="images/user/3.jpg" alt="image description" style="width: 100px; height: 100px;"></figure>
                                    <blockquote style="color: white;"><q>"Một cửa hàng xuất sắc không chỉ giúp người mua tìm kiếm sản phẩm dễ dàng, mà còn tạo ra sự tin tưởng và an tâm trong quá trình mua sắm."</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Võ Phan Hoàng Sang</h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </main>

    </div>
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.vide.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/countTo.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/gmap3.js"></script>
    <script src="js/main.js"></script>
</body>
<?
include('user/component/footer.php');
?>