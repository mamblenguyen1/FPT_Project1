<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
    <aside id="tg-sidebar" class="tg-sidebar">
        <div class="tg-widget tg-widgetsearch">
            <form class="tg-formtheme tg-formsearch">
                <div class="form-group">
                    <button type="submit"><i class="icon-magnifier"></i></button>
                    <input type="search" name="search" class="form-group" placeholder="Tìm kiếm ...">
                </div>
            </form>
        </div>
        <div class="tg-widget tg-catagories">
            <div class="tg-widgettitle">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="tg-widgetcontent">
                <ul>
                    <li><a href="./?pages=user&action=products"><span>Tất cả sản phẩm</span></a>
                </ul>
                <?
                $product = new ProductFunction();
                $row = $product->category_type_select_all();
                foreach ($row as $ketqua) {
                    extract($ketqua);
                ?>
                    <ul>

                        <li><a href="./?pages=user&action=products&category=<?= $category_id ?>"><span><?= $category_name ?></span></a>
                            <ul>
                                <?
                                $category = new ProductFunction();
                                $row = $category->category_type_con_select_all($category_id);
                                foreach ($row as $ketqua) {
                                    extract($ketqua);
                                    echo ' <li>
                                                <a href="./?pages=user&action=products&type=' . $type_id . '">' . $type_name . '</a>
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
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="tg-widgetcontent">
                <ul>
                    <?
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND
                                                    products.is_deleted = 1
                                                    ORDER BY products.product_view DESC LIMIT 4");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        foreach ($stmt as $row) {

                            $product_name_text = $product->substringtext($row['product_name'], 25);
                            echo '
                            <li>
                        <article class="tg-post">
                            <figure><a href=""><img src="images/product/' . $row['product_img'] . '.png" alt="image description"></a></figure>
                            <div class="tg-postcontent">
                                <div class="tg-posttitle">
                                    <h3><a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . ' "> ' . $row['product_name'] . '</a></h3>
                                </div>
                                <span class="tg-bookwriter">By: <a href="">' . $row['type_name'] . '</a></span>
                            </div>
                        </article>
                    </li>
                            ';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </aside>
</div>