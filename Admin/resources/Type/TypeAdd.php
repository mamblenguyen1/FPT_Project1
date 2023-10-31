<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addCate'])) {
    $category_name = $_POST['cateName'] ?? "";
    $category_show = $_POST['cateShow'] ?? "";
    if (!$category_name == "" && !$category_show == "") {
        $category->create_category($category_name, $category_show);
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
            <h1 style="padding-left: 30px;">Thêm danh mục con(Hãng , phụ kiện)</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm danh mục con mới vào hệ thống !!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục con</label>
                            <input name="typeName" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["typeName"])) {
                                if (empty($_POST["typeName"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục con </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cate" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Chọn danh mục</option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM category");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['category_id'] . '" >' . $row['category_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <?
                            if (isset($_POST["cate"])) {
                                if (empty($_POST["cate"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="cateShow" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Chọn trang thái hiển thị</option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM isshow");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['show_id'] . '" >' . $row['show_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <?
                            if (isset($_POST["cateShow"])) {
                                if (empty($_POST["cateShow"])) {
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