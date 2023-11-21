<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách mã giảm giá hết hạn</h1>
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
                                        <th>Mã giảm giá</th>
                                        <th>Phần trăm giảm giá</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Mô tả</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $conn = $db->pdo_get_connection();
                                    $stmt = $conn->prepare("SELECT * FROM `promotioncodes`
                                    WHERE IsActive = 2");
                                    $stmt->execute();
                                    if ($stmt->rowCount() > 0) {
                                        foreach ($stmt as $row) {
                                            echo ' 
                                        <tr>
                                        <td>' . $row['Code'] . '</td>
                                        <td>' . $row['Percentage'] . '</td>
                                        <td>' . $row['ExpiryDate'] . '</td>
                                        <td>' . $row['Description'] . '</td>
                                        <td>
                                            <form action="index.php?pages=admin&action=CodeRestore" method="post">
                                                <input type="hidden" name="CodeID" value="' . $row['CodeID'] . '">
                                                <button type="submit" name="restore_code" class="btn btn-outline-primary">Khôi phục</button>
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