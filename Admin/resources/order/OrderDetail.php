<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['detail_order'])) {
  $product_idd = $_POST['order_id'];
};
?>
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
                <h1 style="padding-left: 30px;">Chi tiết đơn hàng</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Tên đơn hàng</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th>Thanh Toán</th>
                      <th>Thời gian đặt hàng</th>
                      <th>Tình trạng</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $tong = 0;
                    $sql = $order->Show_Order_Detail($product_idd);
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>' . $row['product_name'] . '</td>
                          <td>' . $row['product_price'] . '</td>
                          <td>' . $row['order_quantity'] . '</td>
                          <td>' . $row['product_price'] * $row['order_quantity'] . '</td>
                          <td></td>
                          <td>' . $row['order_date'] . '</td>
                          <td></td>
                          <td>
                                <form action="index.php?pages=admin&action=OrderDetail" method="post">
                                  <button type="submit" class="btn btn-danger" name="detail_order"> <i class="fa fa-trash"></i></button>
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