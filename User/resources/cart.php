<?
include('user/component/header.php');
?>
<?
if (isset($_POST['addoneproduct'])) {
  $product_id = $_POST['product_id'];
  $qty = $_POST['qty'];
  if (isset($_COOKIE['userID'])) {
    $userid = $_COOKIE['userID'];
    $qty = intval($qty);
    if ($order->DuplicateCartPro($product_id, $userid)) {
      if ($order->DuplicateCartProStorge($product_id, $userid)) {
        $order->updateCartQtyDup($product_id, $qty);
      } else {
        if ($order->DuplicateCartProStorgeAD($product_id, $userid)) {
          $order->addCartDetails($userid, $product_id, $qty);
        }
      }
    } else {
      if ($order->DuplicateCart($userid)) {
        $order->addCartDetails($userid, $product_id, $qty);
        // echo '<script>alert("Thêm vào chi tiết giỏ hàng thành công ! !")</script>';
      } else {
        $order->addCart($userid, $product_id, $qty);
        echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng ! !")</script>';
        echo '<script>window.location.href="index.php?pages=user&action=products"</script>';
      }
    }
  } else {
    echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng ! !")</script>';
    echo '<script>window.location.href="index.php?pages=user&action=products"</script>';
  }
}
if (isset($_POST['buy'])) {
  $product_id = $_POST['product_id'];
  $qty = $_POST['qty'];
  if (isset($_COOKIE['userID'])) {
    $userid = $_COOKIE['userID'];
    $qty = intval($qty);
    if ($order->DuplicateCartPro($product_id, $userid)) {
      if ($order->DuplicateCartProStorge($product_id, $userid)) {
        $order->updateCartQtyDup($product_id, $qty);
      } else {
        if ($order->DuplicateCartProStorgeAD($product_id, $userid)) {
          $order->addCartDetails($userid, $product_id, $qty);
        }
      }
    } else {
      if ($order->DuplicateCart($userid)) {
        $order->addCartDetails($userid, $product_id, $qty);
        // echo '<script>alert("Thêm vào chi tiết giỏ hàng thành công ! !")</script>';
      } else {
        $order->addCart($userid, $product_id, $qty);
        echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng ! !")</script>';
        echo '<script>window.location.href="index.php?pages=user&action=products"</script>';
      }
    }
  } else {
    echo '<script>alert("Sản phẩm đã được thêm vào giỏ hàng ! !")</script>';
    echo '<script>window.location.href="index.php?pages=user&action=products"</script>';
  }
}
if (isset($_POST['deleteCart'])) {
  $cartdeId = $_POST['cartDetailId'];
  $order->deleteCartDetailAd($cartdeId);
}
if (isset($_POST['updateQty'])) {
  $cartdeId = $_POST['cartDetailId'];
  $cartdeQty = $_POST['cartqty'];
  $order->updateCartQty($cartdeId, $cartdeQty);
}
?>
<link rel="stylesheet" href="../../css/cart.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<table id="cart" class="table table-hover table-condensed" style="width: 80%; margin: 0 auto;">
  <?
  // $id = $_POST['idcmt'];
  if (isset($_COOKIE['userID'])) {
    $conn = $db->pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM `order`, order_detail , user, products
      WHERE
      `order`.order_id = order_detail.order_id
      AND
      `order`.user_id = user.user_id
      AND
      order_detail.product_id = products.product_id
      AND order_detail.order_status_id  = 1
      AND user.user_id = $_COOKIE[userID];
    ");
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      echo '  <thead>
        <tr>
          <th style="width:50%">Sản phẩm</th>
          <th style="width:10%">Giá</th>
          <th style="width:8%">Số lượng</th>
          <th style="width:22%" class="text-center">Tổng cộng</th>
          <th style="width:10%"></th>
        </tr>
      </thead>
      <tbody>';
      $total_price = 0;
      foreach ($stmt as $row) {
        echo '
      <form action="" method="post">
          <tr>
          <td data-th="Product">
            <div class="row">
              <div class="col-sm-2 hidden-xs"><img src="images/product/' . $row['product_img'] . '.png" alt="..." class="img-responsive" /></div>
              <div class="col-sm-10">
                <h4 class="nomargin">' . $row['product_name'] . '</h4>
              </div>
            </div>
          </td>
          <td data-th="Price">' . number_format($product->sale($row['product_price'], $row['product_sale'])) . ' đ</td>
          <td data-th="Quantity">
            <input type="number" value="' . $row['order_quantity'] . '" class="form-control text-center" name="cartqty">
          </td>
          <td data-th="Subtotal" class="text-center">' . number_format($row['order_quantity'] * $product->sale($row['product_price'], $row['product_sale'])) . ' đ</td>
          <td class="actions" data-th="">
          <input type="hidden" name="cartDetailId" value="' . $row['order_detail_id'] . '" id="">
          <button name="updateQty" type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
          <button name="deleteCart" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>    
          </form>        
          </td>
        </tr>
          ';
        $total_product = $row['order_quantity'] * $product->sale($row['product_price'], $row['product_sale']);
        $total_price = $total_price + $total_product;
      }
      echo '
        </tbody>
        <tfoot>
          <tr class="visible-xs">
            <td class="text-center"><strong>Total 1.99</strong></td>
          </tr>
          <tr>
            <td><a href="index.php?pages=user&action=products" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ' . number_format($total_price) . ' đ </strong></td>
            <td>
            <form action="" method="POST">
              <input type="hidden" name="user_id" value="' . $_COOKIE['userID'] . '">
              <input type="hidden" name="order_id" value="' . $order->getInfoUserOrder($_COOKIE['userID'], 'order_id') . '">
              <button name="checkout" type="submit" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></button>
            </form>   
            </td>
          </tr>
        </tfoot>
        ';
      $order->updateCartTotal($row['user_id'], $total_price);
      if (isset($_POST['checkout'])) {
        $user_id = $_POST['user_id'];
        $order_id = $_POST['order_id'];
        $order->updateIsCode($order_id, 0);

        echo "<script>window.location.href = 'index.php?pages=user&action=checkout&user_id=$user_id&order_id=$order_id'</script>";
      };
    } else {
      echo '</table>
    <div class="alert-cart">
  Bạn chưa có sản phẩm trong giỏ hàng ! ! !
</div>
';
    }
  } else {
    echo '<script>alert("Xin vui lòng đăng nhập để vào giỏ hàng")</script>';
    echo '<script>window.location.href="index.php?pages=user&action=home"</script>';
  }
  ?>

</table>
<?
include('user/component/footer.php');
?>
<style>
  .alert-cart {
    text-align: center;
    font-size: 30px;
    margin: 30px auto;
  }
</style>