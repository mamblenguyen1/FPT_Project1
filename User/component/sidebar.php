<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
    <aside id="tg-sidebar" class="tg-sidebar">
        <div class="tg-widget tg-widgetsearch">
            <form class="tg-formtheme tg-formsearch">
                <div class="form-group">
                    <button type="submit"><i class="icon-magnifier"></i></button>
                    <input type="search" name="search" class="form-group" placeholder="Search by title, author, key...">
                </div>
            </form>
        </div>
        <div class="tg-widget tg-catagories">
            <div class="tg-widgettitle">
                <h3>Categories</h3>
            </div>
            <div class="tg-widgetcontent">
                <?
                $product = new ProductFunction();
                $row = $product->category_type_select_all();
                foreach ($row as $ketqua) {
                    extract($ketqua);
                ?>
                    <ul>
                        <li><a href=""><span><?= $category_name ?></span></a>
                            <ul>
                                <?
                                $category = new ProductFunction();
                                $row = $category->category_type_con_select_all($category_id );
                                foreach ($row as $ketqua) {
                                    extract($ketqua);
                                    echo ' <li>
                                                <a href="">'.$type_name.'</a>
                                            </li>';
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                <?
                }
                ?>
            </div>
        </div>
        <div class="tg-widget tg-widgettrending">
            <div class="tg-widgettitle">
                <h3>Trending Products</h3>
            </div>
            <div class="tg-widgetcontent">
                <ul>
                    <li>
                        <article class="tg-post">
                            <figure><a href=""><img src="images/products/img-04.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <div class="tg-posttitle">
                                    <h3><a href="">Where The Wild Things
                                            Are</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="">Kathrine
                                        Culbertson</a></span>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="tg-post">
                            <figure><a href=""><img src="images/products/img-05.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <div class="tg-posttitle">
                                    <h3><a href="">Where The Wild Things
                                            Are</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="">Kathrine
                                        Culbertson</a></span>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="tg-post">
                            <figure><a href=""><img src="images/products/img-06.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <div class="tg-posttitle">
                                    <h3><a href="">Where The Wild Things
                                            Are</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="">Kathrine
                                        Culbertson</a></span>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="tg-post">
                            <figure><a href=""><img src="images/products/img-07.jpg" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <div class="tg-posttitle">
                                    <h3><a href="">Where The Wild Things
                                            Are</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="">Kathrine
                                        Culbertson</a></span>
                            </div>
                        </article>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</div>