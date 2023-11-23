<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['restore_comment'])) {
    $commentID = $_POST['comment_detail_id'];
    $comment->RestoreComment($commentID);
    echo '<script>alert("Đã khôi phục danh mục ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=commentList"</script>';
}
?>
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
                                                  <form action="" method="post">
                                                  <input type="hidden" name="comment_detail_id" value="' . $row['comment_detail_id'] . '">
                                                  <button type="submit" name="restore_comment" class="btn btn-outline-primary">Khôi phục</button>
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