<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['restore_product'])) {
    $productID = $_POST['product_id'];

    // sét danh mục
    $db = new connect();
    $sql = "SELECT * FROM products,category WHERE category.category_id = products.category_id AND products.product_id = $productID AND category.is_deleted = 1";
    $result = $db->pdo_query_one($sql);
    if ($result == null) {
        echo '
            <script>
                Toastify({
                    text:"Hãy Khổi Phục Danh Mục Thuộc Hãng Trước!!!",
                    duration: 3000,
                    gravity: "top",
                    backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                    position: "center",
                    stopOnFocus: true,
                    close: true, // Cho phép đóng toast bằng cách nhấp vào
                    style: {
                        // Các thuộc tính CSS để tùy chỉnh hơn
                        fontSize:"23px",
                        padding:"20px",
                    },
                }).showToast();
            </script>';
    } else {
        $db = new connect();
        $sql = "SELECT * FROM products,type WHERE type.type_id = products.type_id AND products.product_id = $productID AND type.is_deleted = 1";
        $result = $db->pdo_query_one($sql);
        if ($result == null) {
            echo '
            <script>
                Toastify({
                    text:"Hãy Khổi Phục Hãng Thuộc Sản Phẩm Trước!!!",
                    duration: 3000,
                    gravity: "top",
                    backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                    position: "center",
                    stopOnFocus: true,
                    close: true, // Cho phép đóng toast bằng cách nhấp vào
                    style: {
                        // Các thuộc tính CSS để tùy chỉnh hơn
                        fontSize:"23px",
                        padding:"20px",
                    },
                }).showToast();
            </script>';
        } else {
            $product->RestoreProduct($productID);
            echo '
            <script>
                Toastify({
                    text: "Khôi Phục Sản Phẩm Thành Công!!!",
                    duration: 3000,
                    gravity: "top",
                    position: "center",
                    backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
                    stopOnFocus: true,
                    close: true, // Cho phép đóng toast bằng cách nhấp vào
                    className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
                    style: {
                        fontSize:"23px",
                        padding:"20px",
                    },
                }).showToast();
            </script>';
        };
    };
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách sản phẩm ẩn</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Tên danh mục</th>
                                            <th>Hãng</th>
                                            <th>Đơn giá</th>
                                            <th>Chi tiết sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $conn = $db->pdo_get_connection();
                                        $stmt = $conn->prepare("SELECT * FROM products, category, type                 
                                        WHERE products.category_id = category.category_id
                                        AND products.type_id = type.type_id
                                        AND products.is_deleted = 2");
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            foreach ($stmt as $row) {
                                                echo ' 
                                                <tr>    
                                                <td>' . $row['product_name'] . '</td>
                                                <td>' . $row['category_name'] . '</td>
                                                <td>' . $row['type_name'] . '</td>
                                                <td>' . $row['product_price'] . '</td>
                                                <td>
                                                  <form action="" method="post">
                                                    <input type="hidden" name="product_id" value="' . $row['product_id'] . '">
                                                    <button type="submit" name="restore_product" class="btn btn-outline-primary">Khôi phục</button>
                                                </form>
                                              </td>
                                              </tr>
                                        ';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include './admin/componant/footer.php' ?>