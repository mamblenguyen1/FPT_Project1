<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addproduct'])) {
    $category_id = $_POST['category_id'];
    echo $category_id;
    // exit();
}
if (isset($_POST['addPhone'])) {
    $category_id = $_POST['category_id'] ?? "";
    $product_name = $_POST['product_name'] ?? "";
    $product_title = $_POST['product_title'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantily = $_POST['product_quantily'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $accessoy_port = $_POST['accessoy_port'] ?? "";
    $accessoy_micro = $_POST['accessoy_micro'] ?? "";
    $accessory_charge = $_POST['accessory_charge'] ?? "";
    $accessory_use_time = $_POST['accessory_use_time'] ?? "";
    $accessory_capacity = $_POST['accessory_capacity'] ?? "";
    $user_created = 1;
    $product_img = $_FILES['product_img']['name'] ?? "";
    if (
        !$category_id == "" &&
        !$product_name == "" &&
        !$product_title == "" &&
        !$product_price == "" &&
        !$product_sale == "" &&
        !$product_quantily == "" &&
        !$type_id == "" &&
        !$accessoy_port == "" &&
        !$accessoy_micro == "" &&
        !$accessory_charge == "" &&
        !$accessory_use_time == "" &&
        !$accessory_capacity == "" &&
        !$user_created == "" &&
        !$product_img == ""
    ) {
        $product->add_wirelessheadphones($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id, 
        $accessoy_port, $accessoy_micro, $accessory_charge, $accessory_use_time, $accessory_capacity, $user_created);
        echo '<script>alert("tạo thành công !!")</script>';
        // exit();
        echo '<script>window.location.href="index.php?pages=admin&action=listpro"</script>';
    } else {
        $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Thêm Tai NGhe Không Dây</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm phụ kiện mới vào hệ thống !!!</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<? echo $product->getInfoSP($category_id, 'category_id') ?>">
                    <div class="card-body">
                        <!-- Tên phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên tai nghe </label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["product_name"])) {
                                if (empty($_POST["product_name"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên phụ kiện </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- mô tả phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả </label>
                            <input name="product_title" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["product_title"])) {
                                if (empty($_POST["product_title"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập mô tả </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>

                        <!-- giá phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                            <input name="product_price" type="number" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["product_price"])) {
                                if (empty($_POST["product_price"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập giá sản phẩm </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- giá giảm phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sau khi giảm </label>
                            <input name="product_sale" type="number" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["product_sale"])) {
                                if (empty($_POST["product_sale"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập giá giảm của sản phẩm </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- số lượng phụ kiện nhập-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>
                            <input name="product_quantily" type="number" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["product_quantily"])) {
                                if (empty($_POST["product_quantily"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập số lượng phụ kiện</span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Cổng cắm phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cổng cắm phụ kiện</label>
                            <input name="accessoy_port" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["accessoy_port"])) {
                                if (empty($_POST["accessoy_port"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập kích cỡ Cổng cắm </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Micro sau -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Micro</label>
                            <input name="accessoy_micro" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["accessoy_micro"])) {
                                if (empty($_POST["accessoy_micro"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số Micro </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Chân sạc sau -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chân sạc </label>
                            <input name="accessory_charge" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["accessory_charge"])) {
                                if (empty($_POST["accessory_charge"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập kiểu Chân sạc </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Thời gian sạc phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian sạc tai nghe</label>
                            <input name="accessory_use_time" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["accessory_use_time"])) {
                                if (empty($_POST["accessory_use_time"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số Thời gian sạc phụ kiện </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Dung lượng pin phụ kiện -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dung lượng pin </label>
                            <input name="accessory_capacity" type="text" class="form-control" id="exampleInputEmail1">
                            <?
                            if (isset($_POST["accessory_capacity"])) {
                                if (empty($_POST["accessory_capacity"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập dung lượng pin phụ kiện </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- hình ảnh phụ kiện -->
                        <input type="file" name="product_img" id="">
                        <?
                        if (isset($_FILES['product_img']['name'])) {
                            if (empty($_FILES['product_img']['name'])) {
                                echo '<span class="vaild">Xin vui lòng chọn ảnh phụ kiện </span>';
                            } else {
                                echo '';
                            }
                        }
                        ?>
                        <!-- hãng phụ kiện -->
                        <div class="form-group">
                            <label>Hãng phụ kiện</label>
                            <select name="type_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Chọn hãng phụ kiện</option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM `type`, category 
                                WHERE type.category_id = category.category_id
                                AND type.category_id = $category_id");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['type_id'] . '" >' . $row['type_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <?
                            if (isset($_POST["type_id"])) {
                                if (empty($_POST["type_id"])) {
                                    echo '<span class="vaild">Xin vui lòng hãng phụ kiện</span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="addPhone" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>