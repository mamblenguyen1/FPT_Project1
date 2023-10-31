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
                                    <tr>
                                        <td>Iphone 15 Promax</td>
                                        <td>3</td>
                                        <td>30/10/2023</td>
                                        <td>31/10/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary">Chi tiết bình luận</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laptop ROG Strix G15</td>
                                        <td>3</td>
                                        <td>30/10/2023</td>
                                        <td>31/10/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary">Chi tiết bình luận</button>
                                        </td>
                                    </tr>

                                    </tfoot>
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