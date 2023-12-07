<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['edit_type'])) {
    $type_id = $_POST['type_id'];
    $showNameCate = $type->getInfoType($type_id, 'category_name');
    $showidCate = $type->getInfoType($type_id, 'category_id');
}
if (isset($_POST['delete_type'])) {
    $type_id = $_POST['type_id'];
    $type->deleteCate($type_id);
    echo '
    <script>
        Toastify({
            text: "Đã Xóa Danh Mục Con Thành Công !!!",
            duration: 3000,
            gravity: "top",
            position: "center",
            backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
            stopOnFocus: true,
            close: true, // Cho phép đóng toast bằng cách nhấp vào
            className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
            style: {
                fontSize:"23px",
                padding:"20px",
            },
        }).showToast();
        setTimeout(function() {
          window.location.href = "index.php?pages=admin&action=TypeList";
      }, 800);
    </script>';
}

?>
<?
if (isset($_POST['editType'])) {
    $user_updated = $_COOKIE['userID'];
    $typeid = $_POST['typeid'] ?? "";
    $type_name = $_POST['typeName'] ?? "";
    $category_id = $_POST['typeCate'] ?? "";
    $is_show = $_POST['typeShow'] ?? "";
    if (!$type_name == "" && !$category_id == "") {
        if ($type->checkDuplicateType(trim($type_name), $category_id)) {
            echo '
                <script>
                    Toastify({
                        text:"Danh Mục Con Đã Tồn Tại !!!",
                        duration: 3000,
                        gravity: "top",
                        backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                        position: "center",
                        stopOnFocus: true,
                        close: true, // Cho phép đóng toast bằng cách nhấp vào
                        style: {
                            fontSize:"23px",
                            padding:"20px",
                        },
                    }).showToast();
                </script>';
        } else {
            $type->update_Type($type_name, $category_id, $user_updated, $typeid);
            echo '
                <script>
                    Toastify({
                        text: "Sửa Danh Mục Con Thành Công !!!",
                        duration: 3000,
                        gravity: "top",
                        position: "center",
                        backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
                        stopOnFocus: true,
                        close: true, // Cho phép đóng toast bằng cách nhấp vào
                        className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
                        style: {
                            fontSize:"23px",
                            padding:"20px",
                        },
                    }).showToast();
                </script>';
        }
    } else {
        echo '
            <script>
                Toastify({
                    text:"Vui lòng nhập đủ thông tin !!!",
                    duration: 3000,
                    gravity: "top",
                    backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                    position: "center",
                    stopOnFocus: true,
                    close: true, // Cho phép đóng toast bằng cách nhấp vào
                    style: {
                        fontSize:"23px",
                        padding:"20px",
                    },
                }).showToast();
            </script>';
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Sửa danh mục con</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa danh mục con từ hệ thống !!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <input name="typeid" type="hidden" class="form-control" value="<? echo $type->getInfoType($type_id, 'type_id') ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục con</label>
                            <input name="typeName" type="text" class="form-control" value="<? echo $type->getInfoType($type_id, 'type_name') ?>" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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
                                <option selected value="<? echo
                                                        $showidCate
                                                        ?>"><? echo
                                                            $showNameCate
                                                            ?></option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM category WHERE category_id <> $showidCate AND is_deleted=1");
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