<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['restore_code'])) {
    $CodeID = $_POST['CodeID'] ?? "";
}
?>
<?
if (isset($_POST['reCode'])) {
    $CodeID = $_POST['CodeID'];
    $ExpiryDate = $_POST['ExpiryDate'];
    $ngayGioHienTai = date("Y-m-d");
    if ($ExpiryDate < $ngayGioHienTai) {
        echo '
        <script>
            Toastify({
                text:"Ngày Tháng Không Hợp Lệ !!!",
                duration: 3000,
                gravity: "top",
                backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                position: "center",
                stopOnFocus: true,
                close: true, // Cho phép đóng toast bằng cách nhấp vào
                style: {
                    // Các thuộc tính CSS để tùy chỉnh hơn
                    fontSize:"23px",
                    padding:"20px",
                },
            }).showToast();
        </script>';
    } else {
        $code->restoreCode($CodeID, $ExpiryDate);
        echo '
            <script>
                Toastify({
                    text: "Khôi Phục Mã Giảm Giá Thành Công !!!",
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
                setTimeout(function() {
                    window.location.href="index.php?pages=admin&action=CodeList";
                }, 2000);
            </script>';
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Sửa mã giảm giá</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sửa mã giảm giá từ hệ thống !!!</h3>
                </div>
                <form action="" method="post">
                    <input name="CodeID" type="hidden" class="form-control" value="<? echo $code->getInfoCodeAD($CodeID, 'CodeID') ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày hết hạn :</label>
                        <input name="ExpiryDate" type="date" class="form-control" id="exampleInputEmail1" placeholder="Nhập ngày hết hạn. . ." value="<? echo $code->getInfoCode($CodeID, 'ExpiryDate') ?>">
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
                    <div class="card-footer">
                        <button type="submit" name="reCode" class="btn btn-primary">Lưu mã giảm giá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include './admin/componant/footer.php' ?>