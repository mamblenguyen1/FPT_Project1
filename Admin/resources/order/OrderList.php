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
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <th>Số lượng đon hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Thanh Toán</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $sql = $order->Show_Order();
                                        foreach ($sql as $row) {
                                            extract($sql);
                                            echo ' 
                                                <tr>
                                                <td>' . $row['user_name'] . '</td>
                                                <td>' . $order->CountCart($row['user_id'], 'COUNT(cart.cart_id)') . '</td>
                                                <td>' . $row['user_phone_number'] . '</td>
                                                <td>' . $user->getInfo_address($row['user_id'], 'user_street') . ' -  ' . $user->getInfo_address($row['user_id'], 'xa') . ' - ' . $user->getInfo_address($row['user_id'], 'huyen') . ' - ' . $user->getInfo_address($row['user_id'], 'thanhpho') . '</td>       
                                                <td>Tiền mặt</td>
                                                <td>
                                                    <form action="index.php?pages=admin&action=OrderDetail" method="post">
                                                        <input type="hidden" value="' . $row['order_id'] . '" name="order_id">
                                                        <input type="hidden" value="' . $row['user_id'] . '" name="user_id">
                                                        <button type="submit" name="Das_detail" class="btn  btn-outline-primary">Chi tiết</button>
                                                    </form>
                                                </td>
                                              </tr> 
                                            ';
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