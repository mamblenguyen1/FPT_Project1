<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <p></p>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 style="padding-left: 30px;">Chi tiết sản phẩm điện thoại</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Thông số kỹ thuật</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="" method="post">
                                            <button type="button" class="btn  btn-outline-primary">Chỉnh Sửa</button>
                                            <button type="button" class="btn  btn-outline-danger">Xóa</button>
                                        </form>

                                        <tr>
                                            <td>Iphone 15 ProMax</td>
                                            <td> <img src="images/iphone.jpg" alt="">
                                            </td>
                                            <td>mô tả</td>
                                            <td>
                                                <p>Màn Hình: Siêu xịn</p>
                                                <p>Cam trước: Có</p>
                                                <p>Cam sau: Có</p>
                                                <p>Chip: A17</p>
                                                <p>RAM: 128GB</p>
                                                <p>Dung lượng: 20TB</p>
                                            </td>

                                        </tr>

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