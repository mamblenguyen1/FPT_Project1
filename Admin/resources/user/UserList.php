<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách người dùng</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header" style="width: 200px;">
                            <button type="button" class="btn btn-block btn-outline-primary"><a href="?pages=admin&action=UserAdd">Thêm Tài khoản</a></button>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Địa Chỉ</th>
                                            <th>Vai Trò</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>Người dùng 1</td>
                                            <td>ND1@gmail.com</td>
                                            <td>01234</td>
                                            <td>Cần Thơ</td>
                                            <td>Admin</td>
                                            <td>
                                                <button type="button" class="btn btn-block btn-outline-primary">Chỉnh Sửa</button>
                                                <button type="button" class="btn btn-block btn-outline-danger">Xóa</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Người dùng 2</td>
                                            <td>ND2@gmail.com</td>
                                            <td>04321</td>
                                            <td>Hậu Giang</td>
                                            <td>User</td>
                                            <td>
                                                <button type="button" class="btn btn-block btn-outline-primary">Chỉnh Sửa</button>
                                                <button type="button" class="btn btn-block btn-outline-danger">Xóa</button>
                                            </td>
                                        </tr>


                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include './admin/componant/footer.php' ?>