<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addCate'])) {
    $category_name = $_POST['cateName'] ?? "";
    if (!$category_name == "" ) {
        $category->create_category($category_name);
        echo '<script>alert("tạo thành công !!")</script>';
        echo '<script>window.location.href="index.php?pages=admin&action=listcate"</script>';
    } else {
        $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Thêm danh mục</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm danh mục mới vào hệ thống !!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input name="cateName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["cateName"])) {
                                if (empty($_POST["cateName"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
         
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="addCate" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './admin/componant/footer.php' ?>