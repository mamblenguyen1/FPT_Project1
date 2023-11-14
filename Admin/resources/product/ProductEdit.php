<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<?
if (isset($_POST['ProductEdit'])) {
    $ProductId = $_POST['product_id'];
}
if (isset($_POST['deleteproduct'])) {
    $product_id = $_POST['product_id'];
    $product->deleteProduct($product_id);
    echo '<script>alert("Đã xóa sản phẩm thành công ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=productList"</script>';
}
if (isset($_POST['editProduct'])) {
    $category_id = $_POST['category_id'] ?? "";
    $product_name = $_POST['product_name'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantily = $_POST['product_quantily'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $product_description = $_POST['product_description'] ?? "";
    $product_short_description = $_POST['product_short_description'] ?? "";
    $product_img  = $_FILES['product_img']['name'] ?? "";
    $user_updated = $_COOKIE['userID'];
    $ProductId = $_POST['product_id'];

    // exit();
    if (
        !$category_id == "" &&
        !$product_name == "" &&
        !$product_price == "" &&
        !$product_sale == "" &&
        !$product_quantily == "" &&
        !$type_id == "" &&
        !$user_updated == "" &&
        !$product_img == "" &&
        !$product_description == "" &&
        !$product_short_description == ""

    ) {

        $product->Edit_Product($product_name, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id, $product_short_description, $product_description, $user_updated, $ProductId);
        echo '<script>alert("tạo thành công !!")</script>';
        echo '<script>window.location.href="index.php?pages=admin&action=productList"</script>';
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
            <h1 style="padding-left: 30px;">Sửa sản phẩm</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa sản phẩm từ hệ thống !!!</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input name="product_id" type="hidden" class="form-control" value="<? echo $product->getInfoSP1($ProductId, 'product_id') ?>">

                    <div class="card-body">
                        <!-- Tên Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản phẩm </label>
                            <input name="product_name" type="text" class="form-control" value="<? echo $product->getInfoSP1($ProductId, 'product_name') ?> ">
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


                        <!-- giá Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                            <input name="product_price" type="text" class="form-control" value="<?= $product->getInfoSP1($ProductId, 'product_price') ?> ">
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
                            <input name="product_sale" type="text" class="form-control" value="<?= $product->getInfoSP1($ProductId, 'product_sale') ?> ">
                            <?
                            if (isset($_POST["product_sale"])) {
                                if (empty($_POST["product_sale"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập giá giảm của sản phẩm </span>';
                                } else {
                                    echo '';
                                }
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả ngắn sản phẩm </label>
                            <input name="product_short_description" type="text" class="form-control" value="<? echo $product->getInfoSP1($ProductId, 'product_short_description') ?>">
                            <?
                            if (isset($_POST["product_short_description"])) {
                                if (empty($_POST["product_short_description"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập giá giảm của sản phẩm </span>';
                                } else {
                                    echo '';
                                }
                            } ?>
                        </div>
                        <!-- số lượng Laptop nhập-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>
                            <input name="product_quantily" type="number" class="form-control" value="<? echo $product->getInfoSP1($ProductId, 'product_quantily') ?>">
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

                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_id" id="category" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="<? echo $product->getInfoSP1($ProductId, 'category_id') ?>"><? echo $product->getInfoSP1($ProductId, 'category_name') ?></option>
                            </select>
                            <?
                            if (isset($_POST["category_id"])) {
                                if (empty($_POST["category_id"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Hãng sản phẩm</label>
                            <select name="type_id" id="type" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="<? echo $product->getInfoSP1($ProductId, 'type_id') ?>"><? echo $product->getInfoSP1($ProductId, 'type_name') ?></option>
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

                        <div class="mb-3">
                            <label for="" class="form-label">Thông số kĩ thuật</label>
                            <textarea name="product_description" id="editor"> <? echo $product->getInfoSP1($ProductId, 'product_description') ?></textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="editProduct" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "./admin/resources/product/category.php",
            dataType: 'json',
            success: function(data) {
                $("#category").html("");
                for (i = 0; i < data.length; i++) {
                    var category = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                    var str = ` 
                <option value="${category['category_id']}"> ${category['category_name']} </option>
                   `;
                    $("#category").append(str);
                }
                $("#category").on("change", function(e) {
                    layHuyen();
                });
            }
        });
    })
</script>
<script>
    function layHuyen() {
        var category_id = $("#category").val();
        $.ajax({
            url: "./admin/resources/type/type.php?category_id=" + category_id,
            dataType: 'json',
            success: function(data) {
                $("#type").html("");
                for (i = 0; i < data.length; i++) {
                    var type = data[i];
                    var str = ` 
                <option  value="${type['type_id']}">${type['type_name']} </option>`;
                    $("#type").append(str);
                }

            }
        });
    }
</script>
<?php include './admin/componant/footer.php' ?>