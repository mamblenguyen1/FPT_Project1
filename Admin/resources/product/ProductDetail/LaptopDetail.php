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
                <h1 style="padding-left: 30px;">Chi tiết sản phẩm Laptop</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Mô tả</th>
                      <th>Thông số kỹ thuật</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td>Tên SP1</td>
                      <td>Sẩn phẩm chất lượng tốt</td>
                      <td>
                        <p>Màn Hình: 144hz</p>
                        <p>Card Đồ Họa: RTX 4090</p>
                        <p>CPU: i9</p>
                        <p>RAM: 32GB</p>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-outline-primary">Chỉnh Sửa</button>
                        <button type="button" class="btn btn-block btn-outline-danger">Xóa</button>
                      </td>
                    </tr>

                    <tr>
                      <td>Tên SP2</td>
                      <td>2</td>
                      <td>
                      <p>Màn Hình: 144hz</p>
                        <p>Card Đồ Họa: RTX 3090</p>
                        <p>CPU: i7</p>
                        <p>RAM: 16GB</p>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-outline-primary">Chỉnh Sửa</button>
                        <button type="button" class="btn btn-block btn-outline-danger">Xóa</button>
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