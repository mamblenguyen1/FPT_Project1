<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách bình luận</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bình luận</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng bình luận</th>
                                        <th>Thời gian mới nhất</th>
                                        <th>Thời gian cũ nhất</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $sql = $comment->show_comment();
                                        foreach ($sql as $row) {
                                            extract ($sql);
                                            echo ' 
                                                <tr>
                                                <td>' . $row['product_name'] . '</td>
                                                <td>' . $comment->CountComment($row['comment_id']) . '</td>
                                                <td>' . $comment->NewestCmt($row['comment_id']) . '</td>
                                                <td>' . $comment->LastestCmt($row['comment_id']) . '</td>
                                                <td>
                                                  <form action="index.php?pages=admin&action=commentDetail" method="post">
                                                    <input type="hidden" value="' . $row['product_id'] . '" name="product_id">
                                                    <input type="hidden" value="' . $row['comment_id'] . '" name="comment_id">
                                                    <input type="hidden" value="' . $row['product_name'] . '" name="product_name">
                                                    <button type="submit" name="details" class="btn  btn-outline-primary">Chi tiết</button>
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