<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['edit_cate'])) {
    $cateId = $_POST['cate_id'];
    $showid = $category->getInfoCate($cateId, 'show_id');
    $showName = $category->getInfoCate($cateId, 'show_name');
}
if (isset($_POST['delete_cate'])) {
    $cateId = $_POST['cate_id'];
    $category->deleteCate($cateId);
    echo '<script>alert("Đã xóa danh mục ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=listcate"</script>';
   

}

if (isset($_POST['edit'])) {
    $userId = 1 ;   //Nhớ sửa cái này lại khi hoàn thành xong chức năng user nhé hihi
    $cateId = $_POST['cateId'];
    $category_name = $_POST['cateName'] ?? "";
    $category_show = $_POST['cateShow'] ?? "";
    if (!$category_name == "" || !$category_cnt == "") {
        $category->update_category($category_name, $category_show, $userId, $cateId);
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
                <input name="cateId" type="hidden" class="form-control"  value="<? echo $category->getInfoCate($cateId, 'category_id')?>">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input name="cateName" type="text" class="form-control" value="<? echo $category->getInfoCate($cateId, 'category_name')?>" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="cateShow" class="form-control select2" style="width: 100%;">
                                <option selected value="<? echo
                                  $showid
                                  ?>"><? echo
                                  $showName
                             ?></option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM isshow WHERE isshow.show_id <> $showid");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['show_id'] . '" >' . $row['show_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
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