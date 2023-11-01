<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['edit_type'])) {
    $type_id = $_POST['type_id'];
    $showid = $type->getInfoType($type_id, 'show_id');
    $showName = $type->getInfoType($type_id, 'show_name');
    $showNameCate = $type->getInfoType($type_id, 'category_name');
    $showidCate = $type->getInfoType($type_id, 'category_id');
}
if (isset($_POST['delete_type'])) {
    $type_id = $_POST['type_id'];
    $type->deleteCate($type_id);
    echo '<script>alert("Đã xóa danh mục ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=TypeList"</script>';
}

?>
<?
if (isset($_POST['editType'])) {
    $user_updated = 1 ;
    $typeid = $_POST['typeid'] ?? "";
    $type_name = $_POST['typeName'] ?? "";
    $category_id = $_POST['typeCate'] ?? "";
    $is_show = $_POST['typeShow'] ?? "";
    if (!$type_name == "" && !$category_id == "" && !$is_show == "") {
       $type->update_Type($type_name,$category_id, $is_show, $user_updated, $typeid);
        echo '<script>alert("Cập nhập thành công !!")</script>';
        // exit();
        echo '<script>window.location.href="index.php?pages=admin&action=TypeList"</script>';
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
                <input name="typeid" type="hidden" class="form-control"  value="<? echo $type->getInfoType($type_id, 'type_id')?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục con</label>
                            <input name="typeName" type="text" class="form-control" value="<? echo $type->getInfoType($type_id, 'type_name')?>" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                            <select name="typeCate" class="form-control select2" style="width: 100%;">
                            <option selected value="<?
                                                        $showidCate
                                                        ?>"><? echo
                                                            $showNameCate
                                                            ?></option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM category WHERE category_id <> $showidCate");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['category_id'] . '" >' . $row['category_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <?
                            if (isset($_POST["typeCate"])) {
                                if (empty($_POST["typeCate"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="typeShow" class="form-control select2" style="width: 100%;">
                                <option selected value="<?
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
                                      ?>
                            </select>
                            <?
                            if (isset($_POST["typeShow"])) {
                                if (empty($_POST["typeShow"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn trạng thái hiển thị </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="editType" class="btn btn-primary">Lưu danh mục</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>