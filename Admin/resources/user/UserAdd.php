<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Thêm Tài Khoản</h1>
        </div>
        <div class="add-cate-form">
        <div class="card card-primary">
              <div class="card-header"></div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label>Vai Trò</label>
                    <input type="text" class="form-control" id="exampleInputEmail1">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>

</div>


<?php include './admin/componant/footer.php' ?>