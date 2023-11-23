<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['editStatus'])) {
  $order_status_id = $_POST['order_status_id'];
  $order_id = $_POST['order_id'];
  if (!$order_status_id == "") {
    $order->editStatusOrderAd1($order_status_id, $order_id);
    echo '<script>window.location.href="index.php?pages=admin&action=OrderList"</script>';
  }
}
if (isset($_POST['editStatus'])) {
  $order_status_id = $_POST['order_status_id'];
  $order_id = $_POST['order_id'];
  if (!$order_status_id == "") {
    $order->editStatusOrderAd2($order_status_id, $order_id);
    echo '<script>window.location.href="index.php?pages=admin&action=OrderList"</script>';
  }
}
?>

<?
if (isset($_POST['detail_order'])) {
  $order_ID = $_POST['order_id'];
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
                <h1 style="padding-left: 30px;">Đơn hàng đang chờ</h1>
              </div>
              <button class="btn btn-primary accordion" style="width:15%; margin: 10px 0px 0px 20px">Thay đổi trạng thái đơn hàng</button>
              <div class="panel">
                <form action="" method="post">
                  <p>
                    <input type="hidden" name="order_id" value="<? echo $order_ID; ?>">
                    <?
                    echo '
                       <select name="order_status_id" class="form-control select2" style="width: 9%; margin-left:5px; display: inline-block;">
                         ';
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * FROM `order_status` WHERE order_show = 1");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      foreach ($stmt as $row) {
                        echo '<option value="' . $row['order_status_id'] . '">' . $row['order_status'] . '</option>;';
                      }
                    }
                    echo '
                        </select>';

                    ?>
                    <button type="submit" class="btn btn-primary" name="editStatus">xác nhận</button>
                  </p>
                </form>
              </div>

              <hr>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Tên đơn hàng</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th>Thời gian đặt hàng</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $tong = 0;
                    $sql = $order->Show_Order_Detail_Wait($order_ID);
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>' . $row['product_name'] . '</td>
                          <td>' . $row['product_price'] . '</td>
                          <td>' . $row['order_quantity'] . '</td>
                          <td>' . $row['product_price'] * $row['order_quantity'] . '</td>
                          <td>' . $row['order_date'] . '</td>
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
                <h1 style="padding-left: 30px;">Đơn hàng đang giao</h1>
              </div>
              <button class="btn btn-primary accordion" style="width:15%; margin: 10px 0px 0px 20px">Thay đổi trạng thái đơn hàng</button>
              <div class="panel">
                <form action="" method="post">
                  <p>
                    <input type="hidden" name="order_id" value="<? echo $order_ID; ?>">
                    <?
                    echo '
                       <select name="order_status_id" class="form-control select2" style="width: 9%; margin-left:5px; display: inline-block;">
                         ';
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * FROM `order_status` WHERE order_show = 1 AND order_status_id NOT IN (1,4)");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      foreach ($stmt as $row) {
                        echo '<option value="' . $row['order_status_id'] . '">' . $row['order_status'] . '</option>;';
                      }
                    }
                    echo '
                        </select>';

                    ?>
                    <button type="submit" class="btn btn-primary" name="editStatus">xác nhận</button>
                  </p>
                </form>
              </div>
              <hr>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Tên đơn hàng</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th>Thời gian đặt hàng</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $tong = 0;
                    $sql = $order->Show_Order_Detail_Tracking($order_ID);
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>' . $row['product_name'] . '</td>
                          <td>' . $row['product_price'] . '</td>
                          <td>' . $row['order_quantity'] . '</td>
                          <td>' . $row['product_price'] * $row['order_quantity'] . '</td>
                          <td>' . $row['order_date'] . '</td>
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
                <h1 style="padding-left: 30px;">Đơn hàng đã giao</h1>
              </div>
              <hr>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Tên đơn hàng</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th>Thời gian đặt hàng</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $tong = 0;
                    $sql = $order->Show_Order_Detail_Delivered($order_ID);
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>' . $row['product_name'] . '</td>
                          <td>' . $row['product_price'] . '</td>
                          <td>' . $row['order_quantity'] . '</td>
                          <td>' . $row['product_price'] * $row['order_quantity'] . '</td>
                          <td>' . $row['order_date'] . '</td>
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
                <h1 style="padding-left: 30px;">Đơn hàng đang trong giỏ hàng</h1>
              </div>
              <hr>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr style="text-align: center;">
                      <th>Tên đơn hàng</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th>Thời gian đặt hàng</th>
                    </tr>
                  </thead>
                  <tbody style="text-align: center;">
                    <?
                    $tong = 0;
                    $sql = $order->Show_Order_Detail_Cart($order_ID);
                    foreach ($sql as $row) {
                      extract($sql);
                      echo ' 
                          <tr>
                          <td>' . $row['product_name'] . '</td>
                          <td>' . $row['product_price'] . '</td>
                          <td>' . $row['order_quantity'] . '</td>
                          <td>' . $row['product_price'] * $row['order_quantity'] . '</td>
                          <td>' . $row['order_date'] . '</td>
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