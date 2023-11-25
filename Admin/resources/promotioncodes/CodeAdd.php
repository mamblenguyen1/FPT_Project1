<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addcode'])) {
    $Code = $_POST['Code'] ?? "";
    $Percentage = $_POST['Percentage'] ?? "";
    $ExpiryDate = $_POST['ExpiryDate'] ?? "";
    $Description = $_POST['Description'] ?? "";
    $IsActive = $_POST['IsActive'] ?? "";
    //xét ngày
    $ngayGioHienTai = date("Y-m-d");
    if (!$Code == "" && !$Percentage == "" && !$ExpiryDate == "" &&  !$Description == "" && !$IsActive == "") {
        if ($ExpiryDate < $ngayGioHienTai) {
            echo '<script>alert("Ngày tháng không hợp lệ !!")</script>';
        } else if ($code->checkDuplicateCode(trim($Code))) {
            echo '<script>alert("Mã đã tôn tại!!")</script>';
        } else {
            $code->create_code($Code, $Percentage, $ExpiryDate, $Description, $IsActive);
            echo '<script>alert("tạo mã giảm giá thành công  !!")</script>';
            echo '<script>window.location.href="index.php?pages=admin&action=CodeList"</script>';
        }
    } else {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin!!")</script>';
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Thêm Mã giảm giá</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mã giảm giá mới vào hệ thống !!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>
                            <input name="Code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên. . .">
                            <?
                            if (isset($_POST["Code"])) {
                                if (empty($_POST["Code"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập mã giảm </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phẩn trăm giảm (%) :</label>
                            <input name="Percentage" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập phần trăm giảm cho mã. . .">
                            <?
                            if (isset($_POST["Percentage"])) {
                                if (empty($_POST["Percentage"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập phần trăm giảm </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày hết hạn :</label>
                            <input name="ExpiryDate" type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày hết hạn. . .">
                            <?
                            if (isset($_POST["ExpiryDate"])) {
                                if (empty($_POST["ExpiryDate"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn ngày hết hạn </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả mã giảm :</label>
                            <input name="Description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả cho mã giảm. . .">
                            <?
                            if (isset($_POST["Description"])) {
                                if (empty($_POST["Description"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập mô tả </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Tình trạng mã</label>
                            <select name="IsActive" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Chọn mã giảm giá</option>
                                <?
                                $conn = $db->pdo_get_connection();
                                $stmt = $conn->prepare("SELECT * FROM `status`");
                                $stmt->execute();
                                if ($stmt->rowCount() > 0) {
                                    foreach ($stmt as $row) {
                                        echo ' <option value="' . $row['status_id'] . '" >' . $row['status_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <?
                            if (isset($_POST["IsActive"])) {
                                if (empty($_POST["IsActive"])) {
                                    echo '<span class="vaild">Xin vui lòng chọn trạng thái </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="addcode" class="btn btn-primary">Lưu mã giảm giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './admin/componant/footer.php' ?>