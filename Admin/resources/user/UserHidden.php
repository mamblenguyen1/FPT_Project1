<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['restore_user'])) {
    $userID = $_POST['user_id'];
    $user->RestoreUser($userID);
    echo '<script>alert("Đã khôi phục tài khoản ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=UserList"</script>';
}
//xóa vĩnh viễn
// if (isset($_POST['permanently_deleted_user'])) {
//     $userpermanently = $_POST['user_id'];
//     $user->permanently_deleted_user($userpermanently);
//     echo '<script>alert("Xóa danh mục thành công ! ! !")</script>';
//     echo '<script>window.location.href="index.php?pages=admin&action=UserHidden"</script>';
// }
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách người dùng ẩn</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
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
                                        $row = $user->user_select_all_hidden();
                                        foreach ($row as $ketqua) {
                                            extract($ketqua);
                                        ?>
                                            <tr>
                                                <td><?= $user_name ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $user_password ?></td>
                                                <td><?= $user_phone_number ?></td>
                                                <td><?= $user_street ?> - <?= $ketqua['xa']?> - <?= $ketqua['huyen']?> - <?= $ketqua['thanhpho']?> </td>  
                                                <td><?= $role_id ?></td>
                                                <td><?= $created_at ?></td>
                                                <td>
                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?= $user_id ?>" name="user_id">
                                                        <button type="submit" name="restore_user" class="btn btn-outline-primary">Khôi phục</button>
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