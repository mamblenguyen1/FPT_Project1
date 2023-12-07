<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['restore_type'])) {
    $typeID = $_POST['type_id'];
    $db = new connect();
    $sql = "SELECT * FROM `type`,category WHERE category.category_id = `type`.category_id AND `type`.type_id = $typeID AND category.is_deleted = 1";
    $result = $db->pdo_query_one($sql);
    if ($result == null) {
        echo '
            <script>
                Toastify({
                    text: "Hãy Khôi Phục Danh Mục Thuộc Hãng Trước !!!",
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
            </script>';
    } else {
        $type->RestoreType($typeID);
        echo '
        <script>
            Toastify({
                text: "Khôi Phục Danh Mục Con Thành Công !!!",
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
    };
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách danh mục con</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-outline-primary"><a href="?pages=admin&action=TypeAdd">Thêm danh mục con</a></button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên danh mục con</th>
                                            <th>Số lượng sản phẩm</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $conn = $db->pdo_get_connection();
                                        $stmt = $conn->prepare("SELECT * FROM `type`
                                        WHERE  is_deleted = 2");
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            foreach ($stmt as $row) {
                                                echo ' 
                                        <tr>
                                            <td>' . $row['type_name'] . '</td>
                                            <td>' . $type->CountProduct_type($row['type_id']) . '</td>
                                            <td>' . $row['created_at'] . '</td>
                                            <td>
                                            <form action="" method="post">
                                            <input type="hidden" name="type_id" value="' . $row['type_id'] . '">
                                            <button type="submit" name="restore_type" class="btn btn-outline-primary">Khôi phục</button>
                                           </form>
                                            </td>
                                        ';
                                            }
                                        } ?>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include './admin/componant/footer.php' ?>