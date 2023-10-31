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
                            <div class="card-header">
                                <h3 class="card-title" style="padding-bottom: 10px;">Danh sách tài khoản</h3>
                                <div style="width: 200px;">
                                    <button type="button" class="btn btn-block btn-outline-primary"><a href="?pages=admin&action=UserAdd">Thêm Tài Khoản</a></button>
                                </div>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>

                                        <tr>
                                            <th>Tên người dùng</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Địa Chỉ</th>
                                            <th>Vai Trò</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $row = $user->user_select_all();
                                        foreach ($row as $ketqua) {
                                            extract($ketqua);
                                        ?>
                                            <tr>
                                                <td><?= $user_name ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $user_password ?></td>
                                                <td><?= $user_phone_number ?></td>
                                                <td><?= $user_address ?></td>
                                                <td><?= $role_id ?></td>
                                                <td><?= $created_at ?></td>
                                                <td>
                                                    <form action="index.php?pages=admin&action=UserEdit" method="post">
                                                        <input type="hidden" value="<? echo $user_id ?>" name="user_id">
                                                        <button type="submit" name="edit" class="btn btn-outline-primary">Chỉnh sửa</button>
                                                        <button type="submit" onclick="return confirm('Bạn Có đồng ý xóa không ?')" name="delete" class="btn btn-outline-danger">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>

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