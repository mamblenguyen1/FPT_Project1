<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['LaptopEdit'])) {
    $ProductId = $_POST['product_id'];
    $category_id = $product->getInfoLaptop($ProductId, 'category_id');
}
if (isset($_POST['deleteproduct'])) {
    $product_id = $_POST['product_id'];
    $product->deleteLaptop($product_id);
    echo '<script>alert("Đã xóa sản phẩm thành công ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=listpro"</script>';
}
if (isset($_POST['EditLaptop'])) {
    $category_id = $_POST['category_id'] ?? "";
    $ProductId = $_POST['product_id'];
    $product_name = $_POST['product_name'] ?? "";
    $product_title = $_POST['product_title'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantily = $_POST['product_quantily'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $laptop_screen = $_POST['laptop_screen'] ?? "";
    $laptop_graphic = $_POST['laptop_graphic'] ?? "";
    $laptop_CPU = $_POST['laptop_CPU'] ?? "";
    $laptop_storge = $_POST['laptop_storge'] ?? "";
    $laptop_ram = $_POST['laptop_ram'] ?? "";
    $product_img = $_FILES['product_img']['name'] ?? "";
    $user_created = 1;
if (
    !$category_id == "" &&
    !$product_name == "" &&
    !$product_title == "" &&
    !$product_price == "" &&
    !$product_sale == "" &&
    !$product_quantily == "" &&
    !$type_id == "" &&
    !$laptop_screen == "" &&
    !$laptop_graphic == "" &&
    !$laptop_CPU == "" &&
    !$laptop_storge == "" &&
    !$laptop_ram == "" &&
    !$user_created == "" &&
    !$product_img == "" 
) {
    
    $product->Edit_Laptop($product_name, $product_title, $product_price,$product_sale, $product_img, $product_quantily, $category_id, $type_id, $laptop_ram, $laptop_screen, $laptop_graphic ,$laptop_CPU,
    $laptop_storge, $user_created, $ProductId);
    echo '<script>alert("tạo thành công !!")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=listpro"</script>';
    $anhne = $_FILES['product_img']['tmp_name'];
        $error = $_FILES['product_img']['error'];
        $path = 'images/product/' . $product_img . '.png';
        if (
            $error === 0
        ) {
            move_uploaded_file($anhne, $path);
        }
    } else {
        $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Sửa Laptop</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa Laptop từ hệ thống !!!</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<? echo $product->getInfoLaptop($ProductId, 'category_id') ?>">
                    <input type="hidden" name="product_id" class="form-control"  value="<? echo $product->getInfoLaptop($ProductId, 'product_id')?>">
                    <div class="card-body">
                        <!-- Tên Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Laptop </label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_name')?>">
                            <?
                            if (isset($_POST["product_name"])) {
                                if (empty($_POST["product_name"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên Laptop </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- mô tả Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả Laptop </label>
                            <input name="product_title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_title')?>">
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

                        <!-- giá Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                            <input name="product_price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_price')?>">
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

                        <!-- giá giảm Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sau khi giảm </label>
                            <input name="product_sale" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_sale')?>">
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

                        <!-- số lượng Laptop nhập-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>
                            <input name="product_quantily" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_quantily')?>">
                            <?
                            if (isset($_POST["product_quantily"])) {
                                if (empty($_POST["product_quantily"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập số lượng </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>

                        <!-- Đồ họa Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Đồ họa </label>
                            <input name="laptop_graphic" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_graphic')?>">
                            <?
                            if (isset($_POST["laptop_graphic"])) {
                                if (empty($_POST["laptop_graphic"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập đồ họa </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>

                        <!-- Màn hình Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màn hình Laptop </label>
                            <input name="laptop_screen" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_screen')?>">
                            <?
                            if (isset($_POST["laptop_screen"])) {
                                if (empty($_POST["laptop_screen"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập kích cỡ màn hình </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        
                        <!-- CPU -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPU Laptop </label>
                            <input name="laptop_CPU" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_CPU')?>">
                            <?
                            if (isset($_POST["laptop_CPU"])) {
                                if (empty($_POST["laptop_CPU"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số CPU </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>

                        <!-- Dung lượng Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Dung lượng Laptop </label>
                            <input name="laptop_storge" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_storge')?>">
                            <?
                            if (isset($_POST["laptop_storge"])) {
                                if (empty($_POST["laptop_storge"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số chip Laptop </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>

                        <!-- Ram Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Ram Laptop </label>
                            <input name="laptop_ram" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoLaptop($ProductId, 'product_ram')?>">
                            <?
                            if (isset($_POST["laptop_ram"])) {
                                if (empty($_POST["laptop_ram"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số chip Laptop </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>


                        <!-- hình ảnh sản phẩm -->

                        <input type="file" name="product_img" id="">
                        <?
                        if (isset($_FILES['product_img']['name'])) {
                            if (empty($_FILES['product_img']['name'])) {
                                echo '<span class="vaild">Xin vui lòng chọn ảnh </span>';
                            } else {
                                echo '';
                            }
                        }
                        ?>

                        <!-- hãng sản phẩm -->

                        <div class="form-group">
                            <label>Hãng Laptop</label>
                            <select name="type_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Chọn hãng Laptop</option>
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
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>



                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="EditLaptop" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
?>

<?php include './admin/componant/footer.php' ?>