<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['PhoneEdit'])) {
    $ProductId = $_POST['product_id'];
    $category_id = $product->getInfoPhone($ProductId, 'category_id');
}

if (isset($_POST['EditPhone'])) {
    $category_id = $_POST['category_id'] ?? "";
    $ProductId = $_POST['product_id'];
    $product_name = $_POST['product_name'] ?? "";
    $product_title = $_POST['product_title'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantily = $_POST['product_quantily'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $phone_ram = $_POST['phone_ram'] ?? "";
    $phone_screen = $_POST['phone_screen'] ?? "";
    $phone_backcam = $_POST['phone_backcam'] ?? "";
    $phone_frontcam = $_POST['phone_frontcam'] ?? "";
    $phone_chip = $_POST['phone_chip'] ?? "";
    $phone_storge = $_POST['phone_storge'] ?? "";
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
        !$phone_ram == "" &&
        !$phone_screen == "" &&
        !$phone_backcam == "" &&
        !$phone_frontcam == "" &&
        !$phone_chip == "" &&
        !$phone_storge == "" &&
        !$user_created == "" &&
        !$product_img == ""
    ) {
        $product->Edit_Phone($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id, $phone_ram, $phone_screen, $phone_backcam, $phone_frontcam, $phone_chip, $phone_storge, $user_created, $ProductId);
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
            <h1 style="padding-left: 30px;">Sửa Điện thoại</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa điện thoại từ hệ thống !!!</h3>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<? echo $product->getInfoPhone($ProductId, 'category_id') ?>">
                    <input type="hidden" name="product_id" class="form-control"  value="<? echo $product->getInfoPhone($ProductId, 'product_id')?>">
                    <div class="card-body">
                        <!-- Tên điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên điện thoại </label>
                            <input name="product_name" type="text" class="form-control" value="<? echo $product->getInfoPhone($ProductId, 'product_name')?>" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <label for="exampleInputEmail1">Mô tả điện thoại </label>
                            <input name="product_title" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_title')?>">
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
                            <input name="product_price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_price')?>">
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
                            <input name="product_sale" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_sale')?>">
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
                            <input name="product_quantily" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_quantily')?>">
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
                            <label for="exampleInputEmail1">Dung lượng Ram </label>
                            <input name="phone_ram" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_ram')?>">
                            <?
                            if (isset($_POST["phone_ram"])) {
                                if (empty($_POST["phone_ram"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập dung lượng ram </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Màn hình điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màn hình điện thoại </label>
                            <input name="phone_screen" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_screen')?>">
                            <?
                            if (isset($_POST["phone_screen"])) {
                                if (empty($_POST["phone_screen"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập kích cỡ màn hình </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Camera sau -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Camera sau </label>
                            <input name="phone_backcam" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_backcam')?>">
                            <?
                            if (isset($_POST["phone_backcam"])) {
                                if (empty($_POST["phone_backcam"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số camera sau </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- Camera sau -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Camera trước </label>
                            <input name="phone_frontcam" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_frontcam')?>">
                            <?
                            if (isset($_POST["phone_frontcam"])) {
                                if (empty($_POST["phone_frontcam"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số camera trước </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- chip điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chip điện thoại </label>
                            <input name="phone_chip" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_chip')?>">
                            <?
                            if (isset($_POST["phone_chip"])) {
                                if (empty($_POST["phone_chip"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thông số chip điện thoại </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- dung lượng điện thoại -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dung lượng điện thoại </label>
                            <input name="phone_storge" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . ." value="<? echo $product->getInfoPhone($ProductId, 'product_storge')?>">
                            <?
                            if (isset($_POST["phone_storge"])) {
                                if (empty($_POST["phone_storge"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập dung lượng điện thoại </span>';
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
                            <label>Hãng điện thoại</label>
                            <select name="type_id" class="form-control select2" style="width: 100%;" >
                                <option selected="selected" value="">Chọn hãng điện thoại</option>
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
                            <button type="submit" name="EditPhone" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>