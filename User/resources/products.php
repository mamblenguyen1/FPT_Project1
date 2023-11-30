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
                                            // Số lượng mục trên mỗi trang
                                            $itemsPerPage = 8;

                                            // Trang hiện tại
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                                            // Tính offset
                                            $offset = ($currentPage - 1) * $itemsPerPage;


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
                                                    AND products.is_deleted = 1 AND products.category_id = $category_render LIMIT $offset, $itemsPerPage");
                                            } else if (isset($_GET['type'])) {
                                                $type_render = $_GET['type'];
                                                $conn = $db->pdo_get_connection();
                                                $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND products.is_deleted = 1 AND products.type_id = $type_render LIMIT $offset, $itemsPerPage");
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
                                                            ) LIMIT $offset, $itemsPerPage");
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
                                                            ) LIMIT $offset, $itemsPerPage");
                                                }
                                            } else {
                                                $conn = $db->pdo_get_connection();
                                                $stmt = $conn->prepare("SELECT * FROM products, type, category WHERE
                                                    type.type_id = products.type_id
                                                    AND 
                                                    category.category_id = products.category_id
                                                    AND
                                                    products.is_deleted = 1 LIMIT $offset, $itemsPerPage");
                                            }
                                            $stmt->execute();
                                            if ($stmt->rowCount() > 0) {
                                            ?>
                                                <span>Đã tìm thấy <? echo $stmt->rowCount() ?> sản phẩm </span><br><br>

                                                <!-- Render product -->
                                            <?

                                                foreach ($stmt as $row) {
                                                    $sale = $row['product_sale'] > 0;
                                                    $product_name_text = $product->substringtext($row['product_name'], 30);
                                                    echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                            
                                                <div class="tg-postbook">
                                                    ' . ($sale ? "<span class='saleprice'>-$row[product_sale]%</span>" : "") . '
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img  style="width: 200px;" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                                            <div class="tg-backcover"><img  style="width: 200px;" src="images/product/' . $row['product_img'] . '.png" alt="image description"></div>
                                                            </div>
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
                                                        ' . $product->substringLength($row['product_name'], 22) . '
                                                            </h3>

                                                        </div>
                                                        <span class="tg-bookwriter">Hãng: <a href="">' . $row['type_name'] . '</a></span>
                                                        <span class="tg-stars"><span></span></span>
                                                        <span class="tg-bookprice">
                                                         
                                                            <ins>' . number_format($product->sale($row['product_price'], $row['product_sale'])) . ' đ</ins>
                                                            <br>
                                                            <del>' . ($sale ? "$row[product_price] đ" : "<div><br></div>") . '</del>
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
                                            $totalItems = $db->pdo_query("SELECT COUNT(*) AS item FROM products");
                                            foreach ($totalItems as $row) {
                                                $totalPages = ceil($row['item'] / $itemsPerPage);
                                                echo '<div class="w3-bar" style="width: 100%; overflow: hidden; text-align: center">
                                                ';
                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                    echo '
                                                    <a href="./index.php?pages=user&action=products&page=' . $i . '"class="w3-button">' . $i . '</a>
                                                    ';
                                                }
                                                echo '
                                                </div>';
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
<style>
    .w3-bar {
        display: inline-block;
        height: 50px;
    }

    .w3-bar a {
        height: 50px;
        color: black;
        padding: 8px 16px;
        text-decoration: none;
        font-size: 20px;
        border-radius: 20%;
        border: 1px solid black;
        opacity: 0.5;
    }

    .w3-bar a:hover {
        background-color: lightgray;
        color: #77b748;
        border-radius: 0 0 50% 50%;

    }
</style>