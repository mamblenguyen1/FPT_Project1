<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['addCate'])) {
    $category_name = $_POST['cateName'] ?? "";
    if (!$category_name == "") {
        if ($category->checkDuplicateCate(trim($category_name))) {
            echo '
                <script>
                    Toastify({
                        text:"Danh mục Đã Tồn Tại !!!",
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
            $category->create_category($category_name);
            echo '
                <script>
                    Toastify({
                        text: "Thêm Danh Mục Thành Công !!!",
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
                    text:"Vui Lòng Nhập Đầy Đủ Thông Tin !!!",
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
                            <?
                            if (isset($_POST["cateName"])) {
                                if (empty($_POST["cateName"])) {
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