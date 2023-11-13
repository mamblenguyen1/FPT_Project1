<?
include('user/component/header.php');
?>

<body class="tg-home tg-homeone">
    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <section class="tg-bglight tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="tg-featureditm">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                            <figure><img src="https://apple-store.ifuture.co.in/wp-content/uploads/2023/01/Latest-Apple-Model-iphone-14-2022.png" alt="image description"></figure>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="tg-featureditmcontent">
                                <div class="tg-themetagbox"><span class="tg-themetag">Đặc sắc</span></div>
                                <div class="tg-booktitle">
                                    <h3><a href="javascript:void(0);">Siêu phẩm Iphone 15 Pro Max</a></h3>
                                </div>
                                <span class="tg-bookwriter">Đến từ: <a href="javascript:void(0);">Apple</a></span>
                                <span class="tg-stars"><span></span></span>
                                <div class="tg-priceandbtn">
                                    <span class="tg-bookprice">
                                        <ins>$23.18</ins>
                                        <del>$30.20</del>
                                    </span>
                                    <a class="tg-btn tg-btnstyletwo tg-active" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Mua Ngay</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Featured Item End
        *************************************-->

        <!--************************************
                Best View Start
        *************************************-->
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

                                    $product_name_text = $product->substringtext($row['product_name'], 25);
                                    echo '
                                    <div class="item">
                                <div class="tg-postbook">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                            <div class="tg-backcover"><img src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                        </div>
                                        <a class="tg-btnaddtowishlist" href="javascript:void(0);" style="width: 105%;">
                                            <i class="icon-heart"></i>
                                            <span>Thêm giỏ hàng</span>
                                        </a>
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <ul class="tg-bookscategories">
                                            <li><a href="javascript:void(0);">' .  $row['category_name'] . '</a></li>
                                            <li><a href="javascript:void(0);">' . $row['type_name'] . '</a></li>
                                        </ul>
                                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                                        <div class="tg-booktitle">
                                            <h3><a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . ' ">' . $product_name_text . '</a></h3>
                                        </div>
                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">' .  $row['type_name'] . '</a></span>
                                        <span class="tg-stars"><span></span></span>
                                        <span class="tg-bookprice">
                                            <ins>' . number_format($row['product_sale']) . ' đ</ins>
                                            <del>' . number_format($row['product_price']) . ' đ</del>
                                        </span>
                                        <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);" style="width: 105%;">
                                            <i class="fa fa-shopping-basket"></i>
                                            <em>Thêm Giỏ Hàng</em>
                                        </a>
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
        <!--************************************
                Best Selling End
        *************************************-->

        <!--************************************
                New Release Start
        *************************************-->
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
                                <a class="tg-btn tg-active" href="javascript:void(0);">Xem Tất Cả</a>
                                <a class="tg-btn" href="javascript:void(0);">Thêm</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="tg-newreleasebooks">
                                    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">
                                                    <div class="tg-frontcover"><img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_32067/samsung-galaxy-_main_9_1020.png.webp" alt="image description"></div>
                                                    <div class="tg-backcover"><img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_32067/samsung-galaxy-_main_9_1020.png.webp" alt="image description"></div>
                                                </div>
                                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                    <i class="icon-heart"></i>
                                                    <span>Thêm giỏ hàng</span>
                                                </a>
                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <ul class="tg-bookscategories">
                                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                                    <li><a href="javascript:void(0);">Hãng</a></li>
                                                </ul>
                                                <div class="tg-booktitle">
                                                    <h3><a href="javascript:void(0);">Name</a></h3>
                                                </div>
                                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Hàng VN chất lượng cao</a></span>
                                                <span class="tg-stars"><span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-6 col-lg-4">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">
                                                    <div class="tg-frontcover"><img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_32067/samsung-galaxy-_main_9_1020.png.webp" alt="image description"></div>
                                                    <div class="tg-backcover"><img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_32067/samsung-galaxy-_main_9_1020.png.webp" alt="image description"></div>
                                                </div>
                                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                    <i class="icon-heart"></i>
                                                    <span>Thêm giỏ hàng</span>
                                                </a>
                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <ul class="tg-bookscategories">
                                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                                    <li><a href="javascript:void(0);">Hãng</a></li>
                                                </ul>
                                                <div class="tg-booktitle">
                                                    <h3><a href="javascript:void(0);">Name</a></h3>
                                                </div>
                                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Hàng VN chất lượng cao</a></span>
                                                <span class="tg-stars"><span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-4 hidden-md">
                                        <div class="tg-postbook">
                                            <figure class="tg-featureimg">
                                                <div class="tg-bookimg">
                                                    <div class="tg-frontcover"><img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_32067/samsung-galaxy-_main_9_1020.png.webp" alt="image description"></div>
                                                    <div class="tg-backcover"><img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_32067/samsung-galaxy-_main_9_1020.png.webp" alt="image description"></div>
                                                </div>
                                                <a class="tg-btnaddtowishlist" href="javascript:void(0);">
                                                    <i class="icon-heart"></i>
                                                    <span>Thêm giỏ hàng</span>
                                                </a>
                                            </figure>
                                            <div class="tg-postbookcontent">
                                                <ul class="tg-bookscategories">
                                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                                    <li><a href="javascript:void(0);">Fun</a></li>
                                                </ul>
                                                <div class="tg-booktitle">
                                                    <h3><a href="javascript:void(0);">Name</a></h3>
                                                </div>
                                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Hàng VN chất lượng cao</a></span>
                                                <span class="tg-stars"><span></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                New Release End
        *************************************-->
        đang làm
        <!--************************************
                Collection Count Start
        *************************************-->
        <section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="https://www.anphatpc.com.vn/media/news/1308_Laptop-Gaming-tot-nhat-2022.jpg">
            <div class="tg-sectionspace tg-collectioncount tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div id="tg-collectioncounters" class="tg-collectioncounters">
                            <div class="tg-collectioncounter tg-drama">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-bubble"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Drama</h2>
                                    <h3 data-from="0" data-to="6179213" data-speed="8000" data-refresh-interval="50">6,179,213</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-horror">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart-pulse"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Horror</h2>
                                    <h3 data-from="0" data-to="3121242" data-speed="8000" data-refresh-interval="50">3,121,242</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-romance">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-heart"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Romance</h2>
                                    <h3 data-from="0" data-to="2101012" data-speed="8000" data-refresh-interval="50">2,101,012</h3>
                                </div>
                            </div>
                            <div class="tg-collectioncounter tg-fashion">
                                <div class="tg-collectioncountericon">
                                    <i class="icon-star"></i>
                                </div>
                                <div class="tg-titlepluscounter">
                                    <h2>Fashion</h2>
                                    <h3 data-from="0" data-to="1158245" data-speed="8000" data-refresh-interval="50">1,158,245</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Collection Count End
        *************************************-->
        <!--************************************
                Picked By Author Start
        *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-16 col-sm-16 col-md-16 col-lg-16">
                        <div class="tg-sectionhead">
                            <h2><span>Some Great Books</span>Picked By Authors</h2>
                            <a class="tg-btn" href="javascript:void(0);" style="margin-right: 2%;">Xem Tất Cả</a>
                        </div>
                    </div>
                    <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                        <div class="item">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg" style="background: white;">
                                        <div class="tg-frontcover"><img src="images/iphone.jpg" alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        <div class="tg-description">
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
                                        </div>
                                        <strong class="tg-bookpage">Book Pages: 206</strong>
                                        <strong class="tg-bookcategory">Category: Laptop, Fun</strong>
                                        <strong class="tg-bookprice">Price: $23.18</strong>
                                        <div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
                                    <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Thêm Giỏ Hàng</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img src="images/iphone.jpg" alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        <div class="tg-description">
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
                                        </div>
                                        <strong class="tg-bookpage">Book Pages: 206</strong>
                                        <strong class="tg-bookcategory">Category: Laptop, Fun</strong>
                                        <strong class="tg-bookprice">Price: $23.18</strong>
                                        <div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Drusilla Glandon</a></span>
                                    <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Thêm Giỏ Hàng</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img src="images/iphone.jpg" alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        <div class="tg-description">
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
                                        </div>
                                        <strong class="tg-bookpage">Book Pages: 206</strong>
                                        <strong class="tg-bookcategory">Category: Laptop, Fun</strong>
                                        <strong class="tg-bookprice">Price: $23.18</strong>
                                        <div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="javascript:void(0);">There’s No Time Like The Present</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Patrick Seller</a></span>
                                    <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Thêm Giỏ Hàng</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img src="images/iphone.jpg" alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        <div class="tg-description">
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
                                        </div>
                                        <strong class="tg-bookpage">Book Pages: 206</strong>
                                        <strong class="tg-bookcategory">Category: Laptop, Fun</strong>
                                        <strong class="tg-bookprice">Price: $23.18</strong>
                                        <div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="javascript:void(0);">Seven Minutes In Heaven</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Sunshine Orlando</a></span>
                                    <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Thêm Giỏ Hàng</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tg-postbook">
                                <figure class="tg-featureimg">
                                    <div class="tg-bookimg">
                                        <div class="tg-frontcover"><img src="images/iphone.jpg" alt="image description"></div>
                                    </div>
                                    <div class="tg-hovercontent">
                                        <div class="tg-description">
                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore toloregna aliqua enim adia minim veniam, quis nostrud.</p>
                                        </div>
                                        <strong class="tg-bookpage">Book Pages: 206</strong>
                                        <strong class="tg-bookcategory">Category: Laptop, Fun</strong>
                                        <strong class="tg-bookprice">Price: $23.18</strong>
                                        <div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
                                    </div>
                                </figure>
                                <div class="tg-postbookcontent">
                                    <div class="tg-booktitle">
                                        <h3><a href="javascript:void(0);">Slow And Steady Wins The Race</a></h3>
                                    </div>
                                    <span class="tg-bookwriter">By: <a href="javascript:void(0);">Drusilla Glandon</a></span>
                                    <a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
                                        <i class="fa fa-shopping-basket"></i>
                                        <em>Thêm Giỏ Hàng</em>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Picked By Author End
        *************************************-->
        <!--************************************
                Testimonials Start
        *************************************-->
        <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="https://cutewallpaper.org/28/coffee-and-laptop-wallpaper/146069268.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                            <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
                                <div class="item tg-testimonial">
                                    <figure><img src="images/user1.jpg" alt="image description"></figure>
                                    <blockquote style="color: white;"><q>Chúng tôi luôn mang đến những sản phẩm mới nhất, chất lượng nhất đến khách hàng</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Nguyễn Minh Quang</h3>
                                    </div>
                                </div>

                                <div class="item tg-testimonial">
                                    <figure><img src="images/user1.jpg" alt="image description"></figure>
                                    <blockquote style="color: white;"><q>Chúng tôi luôn mang đến những sản phẩm mới nhất, chất lượng nhất đến khách hàng</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Nguyễn Văn Đặng</h3>
                                    </div>
                                </div>

                                <div class="item tg-testimonial">
                                    <figure><img src="images/user1.jpg" alt="image description"></figure>
                                    <blockquote style="color: white;"><q>Chúng tôi luôn mang đến những sản phẩm mới nhất, chất lượng nhất đến khách hàng</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3 style="color: white;">Quách Thanh Tú</h3>
                                    </div>
                                </div>

                                <div class="item tg-testimonial">
                                    <figure><img src="images/user1.jpg" alt="image description"></figure>
                                    <blockquote style="color: white;"><q>Chúng tôi luôn mang đến những sản phẩm mới nhất, chất lượng nhất đến khách hàng</q></blockquote>
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
        <!--************************************
                Testimonials End
        *************************************-->
        <!--************************************
                Latest News Start
        *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Tin Tức</span>Bài viết mới</h2>
                            <a class="tg-btn" href="javascript:void(0);">Xem Tất Cả</a>
                        </div>
                    </div>
                    <div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="https://ceoworld.biz/wp-content/uploads/2023/03/news-reading-app.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Where The Wild Things Are</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="https://ceoworld.biz/wp-content/uploads/2023/03/news-reading-app.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">All She Wants To Do Is Dance</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="https://ceoworld.biz/wp-content/uploads/2023/03/news-reading-app.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Why Walk When You Can Climb?</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                </ul>
                            </div>
                        </article>
                        <article class="item tg-post">
                            <figure><a href="javascript:void(0);"><img src="https://ceoworld.biz/wp-content/uploads/2023/03/news-reading-app.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <ul class="tg-bookscategories">
                                    <li><a href="javascript:void(0);">Laptop</a></li>
                                    <li><a href="javascript:void(0);">Fun</a></li>
                                </ul>
                                <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
                                <div class="tg-posttitle">
                                    <h3><a href="javascript:void(0);">Dance Like Nobody’s Watching</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                <ul class="tg-postmetadata">
                                    <li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>21,415 Comments</i></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i>24,565 Views</i></a></li>
                                </ul>
                            </div>
                        </article>


                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Latest News End
        *************************************-->
        </main>
        <!--************************************
            Main End
    *************************************-->
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