<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['edit_cate'])) {
    $cateId = $_POST['cate_id'];
}
if (isset($_POST['delete_cate'])) {
    $cateId = $_POST['cate_id'];
    $category->deleteCate($cateId);
    echo '
        <script>
            Toastify({
                text: "Xóa Danh Mục Thành Công !!!",
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
                window.location.href = "index.php?pages=admin&action=listcate";
            }, 800);
        </script>';
}

if (isset($_POST['edit'])) {
    $userId = $_COOKIE['userID'];
    $cateId = $_POST['cateId'];
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
            $category->update_category($category_name, $userId, $cateId);
            echo '
                <script>
                    Toastify({
                        text: "Sửa Danh Mục Thành Công !!!",
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
            <h1 style="padding-left: 30px;">Chỉnh sửa danh mục</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa danh mục từ hệ thống !!!</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="post">
                    <input name="cateId" type="hidden" class="form-control" value="<? echo $category->getInfoCate($cateId, 'category_id') ?>">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input name="cateName" type="text" class="form-control" value="<? echo $category->getInfoCate($cateId, 'category_name') ?>" id="exampleInputEmail1" placeholder="Nhập tên. . .">
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