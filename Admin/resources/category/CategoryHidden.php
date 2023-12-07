<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['restore_cate'])) {
    $cateID = $_POST['category_id'];
    $category->RestoreCate($cateID);
    echo '
        <script>
            Toastify({
                text: "Khôi Phục Danh Mục Thành Công !!!",
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
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách danh mục ẩn</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên Danh mục</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM `category`
                                    WHERE is_deleted = 2");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {
                                            echo ' 
                                        <tr>
                                        <td>' . $row['category_name'] . '</td>
                                        <td>' . $row['created_at'] . '</td>
                                        <td>
                                        <form action="" method="post"> 
                                        <input type="hidden" name="category_id" value="' . $row['category_id'] . '">
                                        <button type="submit" name="restore_cate" class="btn btn-outline-primary">Khôi phục</button>
                                        </form> 
                                        </td>
                                    </tr>
                                        ';
                                        }
                                    }
                                    ?>
                                </tbody>

                            </table>

                           
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>


<?php include './admin/componant/footer.php' ?>