<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['detail_order'])) {
  $order_ID = $_POST['order_id'];
  $user_id = $_POST['user_id'];
};
if(isset($_POST['cancel'])){
    $cart_id = $_POST['cart_id'];
    $order->editStatusCartAd(1, $cart_id);
    echo '<script>window.location.href="index.php?pages=admin&action=OrderList"</script>';

}
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
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <h1 style="padding-left: 30px;">Tất cả đơn hàng</h1>
              </div>


              <hr>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Mã đơn hàng</th>
                      <th>Ngày đặt hàng</th>
                      <th>Địa chỉ nhận hàng</th>
                      <th>Hình thức</th>
                      <th>Tổng giá</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $sql = $order->Hidden_Cart();
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>'.$row['cart_id'].'</td>
                          <td>'.$row['date'].'</td>
                          <td>'.$row['address'].'</td>
                          <td>'.$row['payment'].'</td>
                          <td>'.$row['total_price'].'</td>
                          <td>'.$row['order_status'].'</td>
                          <td>
                          <form action="" method="post">
                              <input type="hidden" value="' . $row['cart_id'] . '" name="cart_id">
                              <button type="submit" name="cancel" class="btn  btn-outline-success">Khôi phục</button>
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

<style>
  div.panel {
    margin-bottom: 3px;
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }
</style>
