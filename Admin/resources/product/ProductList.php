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
                    $row = $product->product_select_all();
                    foreach ($row as $ketqua) {
                      extract($ketqua);
                    ?>
                      <tr>
                        <td><?=$product_name?></td>
                        <td><?=$category_name?></td>
                        <td><?=$type_name?></td>
                        <td><?=$product_price?></td>
                        <td>
                          <form action="?pages=admin&action=" method="post">
                            <input type="hidden" value="<? echo $product_id ?>" name="product_id">
                          <button type="button" class="btn btn-block btn-outline-primary" name="">Xem chi tiết</button>
                        </form>
                      </td>
                      </tr>
                    <?
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