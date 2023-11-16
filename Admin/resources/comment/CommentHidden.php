<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách bình luận ẩn</h1>
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
                                        <th>Tài khoản bình luận</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian mới nhất</th>
                                        <th>Thời gian cũ nhất</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM comment, comment_detail, user, products            
                                    WHERE comment.comment_id = comment_detail.comment_id
                                    AND comment_detail.user_id = user.user_id
                                    AND products.product_id = comment.product_id
                                    AND comment_detail.is_deleted = 2");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {
                                            echo ' 
                                                <tr>
                                                <td>' . $row['user_name'] . '</td>
                                                <td>' . $row['product_name'] . '</td>
                                                <td>' . $row['comment_content'] . '</td>
                                                <td>' . $comment->NewestCmt($row['comment_id']) . '</td>
                                                <td>' . $comment->LastestCmt($row['comment_id']) . '</td>
                                                <td>
                                                  <form action="index.php?pages=admin&action=commentDetail" method="post">
                                                  <button type="submit" name="" class="btn btn-outline-primary">Khôi phục</button>
                                                  <button type="submit" onclick="return confirm(\'Bạn Có đồng ý xóa không ?\')" name="" class="btn btn-outline-danger">Xóa</button>
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