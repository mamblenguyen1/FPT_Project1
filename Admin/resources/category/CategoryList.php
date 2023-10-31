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
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
                                    <tr>
                                        <td>Điện thoại</td>
                                        <td>3</td>
                                        <td>30</td>
                                        <td>31/10/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-block btn-outline-primary">Primary</button>
                                            <button type="button" class="btn btn-block btn-outline-danger">Primary</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Laptop</td>
                                        <td>3</td>
                                        <td>32</td>
                                        <td>31/10/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-block btn-outline-primary">Chỉnh sửa</button>
                                            <button type="button" class="btn btn-block btn-outline-danger">Primary</button>
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