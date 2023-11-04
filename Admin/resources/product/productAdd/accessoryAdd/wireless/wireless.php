<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addproduct'])) {
    $category_id = $_POST['category_id'];
    echo $category_id;
    // exit();
}
if (isset($_POST['addwireless'])) {
    $category_id = $_POST['category_id'] ?? "";
    $product_name = $_POST['product_name'] ?? "";
    $product_title = $_POST['product_title'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantity = $_POST['product_quantity'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $product_port = $_POST['product_port'] ?? "";
    $product_weight = $_POST['product_weight'] ?? "";
    $product_range = $_POST['product_range'] ?? "";
    $product_included = $_POST['product_included'] ?? "";
    $product_capacity = $_POST['product_capacity'] ?? "";
    $product_charge_time = $_POST['product_charge_time'] ?? "";
    $product_use_time = $_POST['product_use_time'] ?? "";
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
    // echo $product_port ;
    // echo '<br/>';
    // echo $product_weight ;
    // echo '<br/>';
    // echo $product_range ;
    // echo '<br/>';
    // echo $product_included ;
    // echo '<br/>';
    // echo $product_capacity ;
    // echo '<br/>';
    // echo $product_charge_time ;
    // echo '<br/>';
    // echo $product_use_time ;
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
        !$product_quantity == "" &&
        !$type_id == "" &&
        !$product_port == "" && //công kết nối
        !$product_weight == "" && //cân nặng
        !$product_range == "" && //khoản cách kết nối
        !$product_included == "" && //thiết bị đi kèm
        !$product_capacity == "" && //dung duong pin
        !$product_charge_time == "" && //thời gian sạc
        !$product_use_time == "" && //thôi gian sửu dụng
        !$product_img == ""

    ) {
        $product->add_Wireless($product_name, $product_title, $product_price, $product_sale, $product_img, $product_quantity, $category_id, $type_id, 
        $product_range, $product_port, $product_weight, $product_included, $product_capacity,$product_charge_time,$product_use_time, $user_created);
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
            <h1 style="padding-left: 30px;">Thêm phụ kiện không dây</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm phụ kiện không dây vào hệ thống ! ! !</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" value="<? echo $product->getInfoSP1($category_id, 'category_id') ?>">
                    <div class="card-body">
                        <!-- Tên thiết bị -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thiết bị : </label>
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
                        <!-- số lượng điện thoại nhập-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>
                            <input name="product_quantity" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["product_quantity"])) {
                                if (empty($_POST["product_quantity"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập số lượng </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- cổng kết nối -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cổng kết nối </label>
                            <input name="product_port" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                        <!-- cân nặng -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cân nặng </label>
                            <input name="product_weight" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                        <!-- khoản cách kết nối -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Khoản cách kết nối : </label>
                            <input name="product_range" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["product_range"])) {
                                if (empty($_POST["product_range"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập khoản cách kết nối </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- phụ kiện đi kèm -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phụ kiện đi kèm : </label>
                            <input name="product_included" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                        <!-- dung lượng pin -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dung lượng pin : </label>
                            <input name="product_capacity" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["product_capacity"])) {
                                if (empty($_POST["product_capacity"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập dung lượng pin </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- thời gian sạc -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian sạc : </label>
                            <input name="product_charge_time" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["product_charge_time"])) {
                                if (empty($_POST["product_charge_time"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thời gian sạc </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- thời gian sữ dụng -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian sử dụng : </label>
                            <input name="product_use_time" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["product_use_time"])) {
                                if (empty($_POST["product_use_time"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập thời gian sử dụng </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!--thêm hình ảnh-->
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
                            <button type="submit" name="addwireless" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>