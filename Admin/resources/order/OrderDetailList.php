<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['editStatus'])) {
  $order_status_id = $_POST['order_status_id'];
  $cart_id = $_POST['cart_id'];
  if (!$order_status_id == "") {
    $order->editStatusCartAd($order_status_id, $cart_id);
    echo '<script>window.location.href="index.php?pages=admin&action=OrderList"</script>';
  }
}

if(isset($_POST['cancel'])){
    $cart_id = $_POST['cart_id'];
    $order->editStatusCartAd(4, $cart_id);
    echo '<script>window.location.href="index.php?pages=admin&action=OrderList"</script>';

}
?>

<?
if (isset($_POST['detail_order'])) {
  $cart_id = $_POST['cart_id'];
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
              <h2 style="margin: 10px 20px;">Trạng thái : <?echo $order->getCartStatusDetail($cart_id,'order_status')?></h2>

              <?
              if($order->getCartStatusDetail($cart_id,'order_status_id') == 1){
                ?>
                <button class="btn btn-primary accordion" style="width:20%; margin: 10px 0px 0px 20px">Thay đổi trạng thái đơn hàng</button>


              <div class="panel">
                <form action="" method="post">
                  <p>
                    <input type="hidden" name="cart_id" value="<? echo $cart_id; ?>">
                    <select name="order_status_id" class="form-control select2" style="width: 9%; margin-left:5px; display: inline-block;">
                    <?
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * FROM `order_status` WHERE order_show = 1 AND order_status.order_status_id NOT IN (1 , 4)");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      foreach ($stmt as $row) {
                        echo '<option value="' . $row['order_status_id'] . '">' . $row['order_status'] . '</option>;';
                      }
                    }

                    ?>
                    </select>

                    <button type="submit" class="btn btn-primary" name="editStatus">xác nhận</button>
                  </p>
                </form>
              </div>
              <form action="" method="post">
              <input type="hidden" name="cart_id" value="<? echo $cart_id; ?>">
              <button class="btn btn-danger" type="submit" name="cancel" style="width:20%; margin: 10px 0px 0px 20px">Hủy đơn hàng</button>
              </form>
                <?

              }else if ($order->getCartStatusDetail($cart_id,'order_status_id') == 2){
                    ?>
                    <button class="btn btn-primary accordion" style="width:20%; margin: 10px 0px 0px 20px">Thay đổi trạng thái đơn hàng</button>
              <div class="panel">
                <form action="" method="post">
                  <p>
                    <input type="hidden" name="cart_id" value="<? echo $cart_id; ?>">
                    <select name="order_status_id" class="form-control select2" style="width: 9%; margin-left:5px; display: inline-block;">
                    <?
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * FROM `order_status` WHERE order_show = 1 AND order_status.order_status_id NOT IN (1 , 2 , 4)");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      foreach ($stmt as $row) {
                        echo '<option  value="' . $row['order_status_id'] . '">' . $row['order_status'] . '</option>;';
                      }
                    }

                    ?>
                    </select>

                    <button  type="submit" class="btn btn-primary" name="editStatus">xác nhận</button>
                  </p>
                </form>
              </div>
                    <?
              }else{
              }
              ?>
              

              <hr>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;">
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Giá sản phẩm</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $STT = 0;
                    $sql = $order->Show_Cart_detail($cart_id);
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>'.$STT++.'</td>
                          <td>'.$row['product_name'].'</td>
                          <td>'.$row['quantity'].'</td>
                          <td>'.number_format($row['product_price']).'đ</td>
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

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    };
  }
</script>