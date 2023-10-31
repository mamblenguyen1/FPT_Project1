<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Danh sách đơn hàng</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Số lượng sản phẩm</th>
                                            <th>Tổng tiền</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?
                                        $conn = $db->pdo_get_connection();
                                        $stmt = $conn->prepare("SELECT * FROM `order` , `user`, `product`, `order_detail`
                                        WHERE `order`.user_id = `user`.user_id
                                        AND product.product_id = order_detail.product_id
                                        AND `order`.order_id = order_detail.order_id");
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            foreach ($stmt as $row) {
                                                echo '<tr>
                                                <td>' . $row['user_name'] . '</td>
                                                <td>2</td>
                                                <td>350,000</td>
                                                <td>123456</td>
                                                <td>Cần Thơ</td>
                                                <td>
                                                    <a href="?pages=admin&action=OrderDetail">
                                                        <button type="button" class="btn btn-block btn-outline-primary">Chi tiết đơn hàng</button>
                                                    </a>
                                                </td>
                                            </tr>';
                                            }
                                        }
                                        ?>

                                        <tr>
                                            <td>Khách hàng 2</td>
                                            <td>3</td>
                                            <td>50,000</td>
                                            <td>987654</td>
                                            <td>Hậu Giang</td>
                                            <td>
                                                <button type="button" class="btn btn-block btn-outline-primary">Chi tiết đơn hàng</button>
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