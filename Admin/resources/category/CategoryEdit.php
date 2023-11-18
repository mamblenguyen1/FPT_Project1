<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['edit_cate'])) {
    $cateId = $_POST['cate_id'];
}
if (isset($_POST['delete_cate'])) {
    $cateId = $_POST['cate_id'];
    $category->deleteCate($cateId);
    echo '<script>alert("Đã xóa danh mục ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=listcate"</script>';
}
if (isset($_POST['edit'])) {
    $userId = 1;   //Nhớ sửa cái này lại khi hoàn thành xong chức năng user nhé hihi
    $cateId = $_POST['cateId'];
    $category_name = $_POST['cateName'] ?? "";
    if (!$category_name == "" || !$category_cnt == "") {
        $category->update_category($category_name, $userId, $cateId);

        echo '<script>alert("Cập nhật thành công")</script>';
        echo '<script>window.location.href="index.php?pages=admin&action=listcate"</script>';
    } else {
        $_SESSION['messages'] = "Bạn phải nhập thông tin đầy đủ";
    }
}


?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Chỉnh sửa danh mục</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa danh mục từ hệ thống !!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <input name="cateId" type="hidden" class="form-control" value="<? echo $category->getInfoCate($cateId, 'category_id') ?>">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>

                            <input name="cateName" type="text" class="form-control" value="<? echo $category->getInfoCate($cateId, 'category_name') ?>" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="edit" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php include './admin/componant/footer.php' ?>