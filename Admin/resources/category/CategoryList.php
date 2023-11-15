<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách danh mục</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="width: 200px;">
                        <a href="?pages=admin&action=addcate" class="btn btn-block btn-outline-primary">Thêm danh mục</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên Danh mục</th>
                                        <th>Số loại danh mục</th>
                                        <th>Số lượng tất cả sản phẩm</th>
                                        <th>Thời gian tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM `category`
                                    WHERE is_deleted = 1");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {
                                            echo ' 
                                        <tr>
                                        <td>' . $row['category_name'] . '</td>
                                        <td>'.$category->CountType($row['category_id']).'</td>
                                        <td>'.$category->CountProduct($row['category_id']).'</td>
                                        <td>' . $row['created_at'] . '</td>
                                        <td>
                                        <form action="index.php?pages=admin&action=editcate" method="post">
                                             <input type="hidden" value="' . $row['category_id'] . '" name="cate_id">
                                             <button type="submit" name="edit_cate" class="btn btn-outline-primary">Chỉnh sửa</button>
                                             <button type="submit" onclick="return confirm(\'Bạn Có đồng ý xóa không ?\')" name="delete_cate" class="btn btn-outline-danger">Xóa</button>
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
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>


<?php include './admin/componant/footer.php' ?>