<?
include('user/component/header.php');
?>
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">

    <!--************************************
				Inner Banner Start
		*************************************-->
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="https://www.anphatpc.com.vn/media/news/1308_Laptop-Gaming-tot-nhat-2022.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Tất cả sản phẩm</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="">Trang chủ</a></li>
                            <li class="tg-active">Sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************
				Inner Banner End
		*************************************-->
    <!--************************************
				Main Start
		*************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
					News Grid Start
			*************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-products">
                                    <div class="tg-sectionhead">
                                        <h2><span>Danh mục sản phẩm</span>Điện thoại</h2>
                                    </div>
                                    <div class="tg-featurebook alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="tg-featureditm">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                                                    <figure><img src="images/iphone.jpg" alt="image description">
                                                    </figure>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                    <div class="tg-featureditmcontent">
                                                        <div class="tg-themetagbox"><span class="tg-themetag">Đang giảm giá</span></div>
                                                        <div class="tg-booktitle">
                                                            <h3><a href="index.php?pages=user&action=productdetail">Iphone 15 Promax</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">Hãng: <a href="">APPLE</a></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <div class="tg-priceandbtn">
                                                            <span class="tg-bookprice">
                                                                <ins>30.000.000</ins>
                                                                <del>39.999.999</del>
                                                            </span>
                                                            <a class="tg-btn tg-btnstyletwo tg-active" href="">
                                                                <i class="fa fa-shopping-basket"></i>
                                                                <em>Thêm vào giỏ hàng</em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tg-productgrid">
                                        <div class="tg-refinesearch">
                                            <span>showing 1 to 8 of 20 total</span>
                                            <form class="tg-formtheme tg-formsortshoitems">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label></label>
                                                        <select>
                                                            <option>Sắp xếp theo:</option>
                                                            <option>Giá</option>
                                                            <option>Hãng</option>
                                                            <option>Năm</option>
                                                        </select>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <!-- <span class="tg-select"> -->
                                                        <select>
                                                            <option>Hiển thị:</option>
                                                            <option>8</option>
                                                            <option>16</option>
                                                            <option>20</option>
                                                        </select>
                                                        <!-- </span> -->
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <!-- Render product -->
                                        <?
                                        $product1 = new ProductFunction();
                                        $row = $product1->product1_select_all();
                                        foreach ($row as $ketqua) {
                                            extract($ketqua);
                                        ?>
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                                <div class="tg-postbook">
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img src="images/iphone.jpg" alt="image description"></div>
                                                            <!-- <div class="tg-backcover"><img src="images/books/img-01.jpg" alt="image description"></div> -->
                                                        </div>
                                                        <a class="tg-btnaddtowishlist" href="">
                                                            <i class="icon-heart"></i>
                                                            <span>Yêu thích</span>
                                                        </a>
                                                    </figure>
                                                    <div class="tg-postbookcontent">
                                                        <ul class="tg-bookscategories">
                                                            <li><a href="">Điện thoại</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
                                                        <div class="tg-booktitle">
                                                            <h3><a href="index.php?pages=user&action=productdetail">Iphone 15 promax</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">Hãng: <a href="">Apple</a></span>
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
                                        <?
                                        }
                                        ?>
                                        <!-- / Render product -->



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

<?
include('user/component/footer.php');
?>