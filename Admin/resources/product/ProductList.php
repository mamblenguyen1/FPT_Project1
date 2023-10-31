<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel" >
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
                  <th>Số loại danh mục</th>
                  <th>Hãng</th>
                  <th>Đơn giá</th>
                  <th>Chi tiết sản phẩm</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                  <td>Tên SP1</td>
                  <td>3</td>
                  <td>Apple</td>
                  <td> 4</td>
                  <td>
                      <button type="button" class="btn btn-block btn-outline-primary">Xem chi tiết</button>
                    </td>
                </tr>

                <tr>
                  <td>Tên SP2</td>
                  <td>2</td>
                  <td>ACER</td>
                  <td>5</td>
                  <td>
                      <button type="button" href="" class="btn btn-block btn-outline-primary">Xem chi tiết</button>
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