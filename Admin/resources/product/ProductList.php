<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 style="padding-left: 30px;">Danh sách sản phẩm</h1>
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
                      <th>Tên sản phẩm</th>
                      <th>Tên danh mục</th>
                      <th>Hãng</th>
                      <th>Đơn giá</th>
                      <th>Chi tiết sản phẩm</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                    $conn = $db->pdo_get_connection();
                    $stmt = $conn->prepare("SELECT * from products, category, type                 
                    WHERE products.category_id = category.category_id
                    AND products.type_id = type.type_id
                    AND products.is_deleted = 1");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      foreach ($stmt as $row) {

                        echo ' 
                                                <tr>
                                                <td>' . $row['product_name'] . '</td>
                                                <td>' . $row['category_name'] . '</td>
                                                <td>' . $row['type_name'] . '</td>
                                                <td>' . $row['product_price'] . '</td>
                                                <td>
                                                  <form action="?pages=admin&action=productDetail" method="post">
                                                    <input type="hidden" value="' . $row['product_id'] . '" name="product_id">
                                                    <input type="hidden" value="' . $row['category_id'] . '" name="category_id">
                                                  <button type="submit" class="btn btn-block btn-outline-primary" name="detail">Xem chi tiết</button>
                                                </form>
                                              </td>
                                              </tr>
                                        ';
                      }
                    } ?>
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