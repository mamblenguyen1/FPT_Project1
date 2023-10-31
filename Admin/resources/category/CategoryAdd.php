<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
    if (isset($_POST['addCate'])) {
        $category_name = $_POST['cateName'] ?? "";
        $category_show = $_POST['cateShow'] ?? "";
        if (!$category_name == "" || !$category_cnt == "") {
            $category->create_category($category_name , $category_show);
            echo'<script>alert("tạo thành công !!")</script>';
            echo '<script>window.location.href="/Admin/index.php?page=ls&lsid=0"</script>';
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
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="cateShow" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Chọn trang thái hiển thị</option>
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