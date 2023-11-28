<?
include('user/component/header.php');
?>
<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-products">
                                    <div class="tg-sectionhead">
                                        <h2><span>Danh mục sản phẩm</span></h2>
                                    </div>
                                    <div class="tg-productgrid">
                                        <div class="tg-refinesearch">
                                            <?
                                            $category_render = 0;
                                            $type_render = 0;
                                            $keyword_render  = 0;
                                            if (isset($_GET['category'])) {
                                                $category_render = $_GET['category'];
                                                $conn = $db->pdo_get_connection();
                                                $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND products.is_deleted = 1 AND products.category_id = $category_render");
                                            } else if (isset($_GET['type'])) {
                                                $type_render = $_GET['type'];
                                                $conn = $db->pdo_get_connection();
                                                $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND products.is_deleted = 1 AND products.type_id = $type_render");
                                            } else if (isset($_GET['search'])) {
                                                $keyword_render = $_GET['search'];
                                                $category_render = $_GET['id'];
                                                if ($category_render == 0) {
                                                    $conn = $db->pdo_get_connection();
                                                    $stmt = $conn->prepare("SELECT * FROM products , category , type
                                                        WHERE products.category_id = category.category_id
                                                        AND products.type_id = type.type_id
                                                        AND products.is_deleted = 1
                                                        AND products.product_id IN
                                                        (
                                                        SELECT  products.product_id FROM products , category
                                                        WHERE
                                                        category.category_id = products.category_id
                                                        AND products.is_deleted = 1
                                                        AND category.category_name LIKE '%$keyword_render%'
                                                            UNION
                                                        SELECT  products.product_id FROM products , type
                                                        WHERE
                                                        type.type_id = products.type_id
                                                        AND products.is_deleted = 1                                                
                                                        AND type.type_name LIKE '%$keyword_render%'
                                                        UNION
                                                        SELECT  products.product_id FROM products 
                                                        WHERE products.is_deleted = 1                                                
                                                        AND products.product_name LIKE '%$keyword_render%'
                                                            )");
                                                } else {
                                                    $conn = $db->pdo_get_connection();
                                                    $stmt = $conn->prepare("SELECT * FROM products , category , type
                                                        WHERE products.category_id = category.category_id
                                                        AND products.type_id = type.type_id
                                                        AND products.is_deleted = 1
                                                        AND products.category_id = $category_render
                                                        AND products.product_id IN
                                                        
                                                        (
                                                        SELECT  products.product_id FROM products , category
                                                        WHERE
                                                        category.category_id = products.category_id
                                                        AND products.is_deleted = 1
                                                        AND category.category_name LIKE '%$keyword_render%'
                                                            UNION
                                                        SELECT  products.product_id FROM products , type
                                                        WHERE
                                                        type.type_id = products.type_id
                                                        AND products.is_deleted = 1                                                
                                                        AND type.type_name LIKE '%$keyword_render%'
                                                            )");
                                                }
                                            } else {
                                                $conn = $db->pdo_get_connection();
                                                $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND
                                                    products.is_deleted = 1 ");
                                            }
                                            $stmt->execute();
                                            if ($stmt->rowCount() > 0) {
                                            ?>
                                                <span>Đã tìm thấy <? echo $stmt->rowCount() ?> sản phẩm </span><br><br>

                                                <!-- Render product -->
                                            <?

                                                foreach ($stmt as $row) {

                                                    $product_name_text = $product->substringtext($row['product_name'], 22);
                                                    echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                                <div class="tg-postbook">
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img  style="width: 300px; height: 200px;" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                                            <div class="tg-backcover"><img  style="width: 300px; height: 200px;" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                                            </div>
                                                        <a class="tg-btnaddtowishlist" href="">
                                                            <i class="icon-heart"></i>
                                                            <span>Yêu thích</span>
                                                        </a>
                                                    </figure>
                                                    <div class="tg-postbookcontent">
                                                        <ul class="tg-bookscategories">
                                                            <li><a href="">' .  $row['category_name'] . '   </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tg-themetagbox"><span class="tg-themetag">hot</span></div>
                                                        <div class="tg-booktitle">
                                                        
                                                            <h3>
                                                            <a href="index.php?pages=user&action=productdetail&category_id=' . $row['category_id'] . '&product_id=' . $row['product_id'] . ' ">' . $product_name_text . '</a>
                                                        </h3>
                                                        </div>
                                                        <span class="tg-bookwriter">Hãng: <a href="">' . $row['type_name'] . '</a></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <span class="tg-bookprice">
                                                            <ins>' . number_format($row['product_price'])
                                                        . ' đ</ins>
                                                            <br>
                                                            <del>' . number_format($row['product_sale']) . ' đ</del>
                                                        </span>
                                                        <form action="index.php?pages=user&action=cart" method="post">
                                                        <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                                                        <input type="hidden" name="qty" value="1">
                                                        <button type="submit" class="tg-btn tg-btnstyletwo" name="addoneproduct" ><i class="fa fa-shopping-basket"></i>
                                                            Thêm giỏ hàng</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>';
                                                };
                                            } else {
                                                if (isset($keyword_render)) {
                                                    if ($category_render == 0) {
                                                        echo '<h4>Không tìm thấy sản phẩm <strong>' . $keyword_render . '</strong></h4>';
                                                    } else {
                                                        echo '<h4>Không tìm thấy sản phẩm <strong>' . $keyword_render . '</strong> theo danh mục trên   </h4>';
                                                    }
                                                } else {
                                                    echo '<h4>Danh mục chưa có sản phẩm !</h4>';
                                                }
                                            };

                                            ?>
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
    </main>
</div>
<?
include('user/component/footer.php');
?>