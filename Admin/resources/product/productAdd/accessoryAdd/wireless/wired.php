<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addproduct'])) {
    $category_id = $_POST['category_id'];

}
if (isset($_POST['addPhone'])) {
    $category_id = $_POST['category_id'] ?? "";
    $product_name = $_POST['product_name'] ?? "";
    $product_title = $_POST['product_title'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantily = $_POST['product_quantily'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $product_length = $_POST['product_length'] ?? "";
    $product_port = $_POST['product_port'] ?? "";
    $product_weight = $_POST['product_weight'] ?? "";
    $product_included = $_POST['product_included'] ?? "";
    $user_created = 1;
    $product_img = $_FILES['product_img']['name'] ?? "";

    // echo $category_id ;
    // echo '<br/>';
    // echo $product_name ;
    // echo '<br/>';
    // echo $product_title ;
    // echo '<br/>';
    // echo $product_price ;
    // echo '<br/>';
    // echo $product_sale ;
    // echo '<br/>';
    // echo $product_quantily ;
    // echo '<br/>';
    // echo $type_id ;
    // echo '<br/>';
    // echo $product_length ;
    // echo '<br/>';
    // echo $product_port ;
    // echo '<br/>';
    // echo $product_weight ;
    // echo '<br/>';
    // echo $product_included ;
    // echo '<br/>';
    // echo $user_created ;
    // echo '<br/>';
    // echo $product_img ;
    // echo '<br/>';
    // exit();

    if (
        !$category_id == "" &&
        !$product_name == "" &&
        !$product_title == "" &&
        !$product_price == "" &&
        !$product_sale == "" &&
        !$product_quantily == "" &&
        !$type_id == "" &&
        !$product_length == "" &&
        !$product_port == "" &&
        !$product_weight == "" &&
        !$product_included == "" &&
        !$user_created == "" &&
        !$product_img == ""
    ) {

        $product->add_Wired($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily, $type_id, $product_length, $product_port, $product_weight, $product_included,  $user_created);

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
            <h1 style="padding-left: 30px;">Thêm phụ kiện có dây</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm phụ kiện có dây vào hệ thống ! ! !</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<? echo $product->getInfoSP1($category_id, 'category_id') ?>">
                    <div class="card-body">
                        <!-- Tên điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thiết bị :  </label>
                            <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["product_name"])) {
                                if (empty($_POST["product_name"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên điện thoại </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- mô tả điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả thiết bị </label>
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

                        <!-- giá điện thoại -->
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
                        <!-- giá giảm điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sau khi giảm </label>

                            <input name="product_sale" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." >
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
                        <!-- số lượng điện thoại nhập-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>

                            <input name="product_quantily" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." >
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
                        <!-- Ram điện thoại -->


                        <div class="form-group">
                            <label for="exampleInputEmail1">Độ dài dây </label>

                            <input name="product_length" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." >
                            <?
                            if (isset($_POST["product_length"])) {
                                if (empty($_POST["product_length"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập dung lượng ram </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Màn hình điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cổng kết nối </label>

                            <input name="product_port" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." >
                            <?
                            if (isset($_POST["product_port"])) {
                                if (empty($_POST["product_port"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập kích cỡ màn hình </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Camera sau -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cân nặng </label>

                            <input name="product_weight" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." >
                            <?
                            if (isset($_POST["product_weight"])) {
                                if (empty($_POST["product_weight"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số camera sau </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Camera sau -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phụ kiện đi kèm : </label>

                            <input name="product_included" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." >
                            <?
                            if (isset($_POST["product_included"])) {
                                if (empty($_POST["product_included"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số camera trước </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- chip điện thoại -->
                      

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
                            <label>Hãng điện thoại</label>
                            <select name="type_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Chọn hãng phụ kiện</option>
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
                            <button type="submit" name="addPhone" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>