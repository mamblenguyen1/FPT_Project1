<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách danh mục con</h1>
            <!-- <img style="width:500px" src="images/Type/logo-hp.png" alt="haha"> -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <a href="?pages=admin&action=TypeAdd" class="btn btn-outline-primary">Thêm danh mục con</a>
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
                                    WHERE  is_deleted = 1");
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            foreach ($stmt as $row) {
                                                echo ' 
                                        <tr>
                                            <td>' . $row['type_name'] . '</td>
                                            <td>' . $type->CountProduct_type($row['type_id']) . '</td>
                                            <td>' . $row['created_at'] . '</td>
                                            <td>
                                            <form action="index.php?pages=admin&action=TypeEdit" method="post">
                                            <input type="hidden" value="' . $row['type_id'] . '" name="type_id">
                                            <button type="submit" name="edit_type" class="btn btn-outline-primary">Chỉnh sửa</button>
                                            <button type="submit" onclick="return confirm(\'Bạn Có đồng ý xóa không? Việc này sẻ bao gồm xóa tất cả sản phẩm có trong hãng này !!!\')" name="delete_type" class="btn btn-outline-danger">Xóa</button>
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