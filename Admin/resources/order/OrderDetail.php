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
                  <tbody>

                    <tr>
                      <td>Đơn hàng 1</td>
                      <td>50,000</td>
                      <td>5</td>
                      <td>250,000</td>
                      <td>Chuyển Khoản</td>
                      <td>15/12/2022</td>
                      <td>Đang giao</td>
                      <td>
                        <button type="button" class="btn btn-block btn-outline-primary">Chỉnh Sửa</button>
                        <button type="button" class="btn btn-block btn-outline-danger">Xóa</button>
                      </td>
                    </tr>

                    <tr>
                      <td>Đơn hàng 2</td>
                      <td>100,000</td>
                      <td>3</td>
                      <td>300,000</td>
                      <td>Tiền mặt</td>
                      <td>1/1/2023</td>
                      <td>Chưa giao</td>
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