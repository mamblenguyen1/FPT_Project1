<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addproduct'])) {
    $category_id = $_POST['category_id'];
    $category_id1 = $product->getInfoSP1($category_id, 'category_id');

}
if (isset($_POST['addLaptop'])) {
    $category_id = $_POST['category_id'] ?? "";
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
    // echo $category_id ;
    // echo $product_name;
    // echo $product_title;
    // echo $product_price;
    // echo $product_sale;
    // echo $product_quantily;
    // echo $type_id;
    // echo $laptop_screen;
    // echo $laptop_graphic;
    // echo $laptop_CPU;
    // echo $laptop_storge;
    // echo $laptop_ram;
    // echo $user_created;
    // echo $product_img;
    // exit();

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
    
    $product->add_laptop($product_name, $product_title,$product_price,$product_sale,$product_img,$product_quantily,$category_id,$type_id,$laptop_screen,$laptop_graphic,$laptop_CPU,$laptop_storge,$laptop_ram,$user_created);
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
            <h1 style="padding-left: 30px;">Thêm Laptop</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Laptop mới vào hệ thống !!!</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<?= $category_id1   ?>">
                    <div class="card-body">
                        <!-- Tên Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Laptop </label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="product_title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="product_price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="product_sale" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="product_quantily" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="laptop_graphic" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="laptop_screen" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="laptop_CPU" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="laptop_storge" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <input name="laptop_ram" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <button type="submit" name="addLaptop" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>