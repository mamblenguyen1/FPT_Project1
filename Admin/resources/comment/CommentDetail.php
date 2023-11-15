<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<?
if(isset($_POST['details'])){
 $product_id = $_POST['product_id'];
 $product_id = $_POST['comment_id'];
};
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách chi tiết bình luận</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bình luận về sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tài khoản bình luận</th>
                                        <th>Ngày bình luận</th>
                                        <th>Nội dung bình luận</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?
                                    $sql = $comment->show_Comment_Detail($product_id);
                                        foreach ($sql as $row) {
                                            extract ($sql);
                                            echo ' 
                                                <tr>
                                                <td>' . $row['user_name'] . '</td>
                                                <td>' . $row['comment_date'] . '</td>
                                                <td>' . $row['comment_content'] . '</td>
                                                <td>
                                                  <form action="index.php?pages=admin&action=commentReply" method="post">
                                                    <input type="hidden" value="' . $row['comment_detail_id'] . '" name="comment_detail_id">
                                                    <button type="submit" name="CommentReply" class="btn  btn-outline-primary">Trả lời</button>
                                                    <button type="submit" name="deleteproduct" class="btn  btn-outline-danger">Ẩn</button>
                                                </form>
                                              </td>
                                              </tr>
                                        ';
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