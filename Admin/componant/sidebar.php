<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; background-color:black">
  <!-- Brand Logo -->
  <a href="index.php?pages=admin&action=dashboard" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dự Án 1</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a style="text-decoration:none" href="#" class="d-block"><?=$user->getInfouser2($_COOKIE['userID'], 'user_name')?></a>
      </div>
    </div>
    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="?pages=admin&action=dashboard" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-align-justify"></i>
            <p>
              Danh mục
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $category->Countcategory1() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=listcate" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả danh mục</p>
              </a>

              <a href="?pages=admin&action=CategoryHidden" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh mục đã ẩn</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-align-left"></i>
            <p>
              Danh mục con
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $type->Counttype() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=TypeList" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả danh mục con</p>
              </a>

              <a href="?pages=admin&action=TypeHidden" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh mục con đã ẩn</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-cubes"></i>
            <p>
              Sản phẩm
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $product->CountProducts1() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=productList" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả Sản phẩm</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=ProductAdd" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Sản phẩm</p>
              </a>

              <a href="?pages=admin&action=ProductHidden" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sản phẩm đã ẩn</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-comments"></i>
            <p>
              Bình luận
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $comment->Count_comment1() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?pages=admin&action=commentList" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả bình luận</p>
              </a>

              <a href="index.php?pages=admin&action=CommentHidden" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bình luận đã ẩn</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-cart-plus"></i>
            <p>
              Đơn hàng
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">3</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=OrderList" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả đơn hàng</p>
              </a>

              <a href="?pages=admin&action=OrderHidden" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Đơn hàng đã hủy</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-user"></i>
            <p>
              Tài khoản
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $user->Countuser1() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=UserList" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả tài Khoản</p>
              </a>

              <a href="?pages=admin&action=UserHidden" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tài Khoản đã ẩn</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class='fa fa-envelope'></i>
            <p>
              Thư liên hệ
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $contact->CountContact() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=Contact" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả thư liên hệ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?pages=admin&action=ContactSpam" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thư rác</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Mã giảm giá -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fa fa-percent"></i>
            <p>
              Mã giảm giá
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right"><? echo $code->CountCode() ?></span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?pages=admin&action=CodeList" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tất cả mã giảm giá</p>
              </a>

              <a href="?pages=admin&action=CodeNull" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mã giảm giá đã hết hạn</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="logout.php" class="nav-link">
          <i class='fas fa-sign-out-alt'></i>
            <p>
              Đăng Xuất
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="http://localhost/FPT_Project1/" class="nav-link">
          <i class='fas fa-sign-out-alt'></i>
            <p>
              Trở về
            </p>
          </a>
        </li>

      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<style>
    *{
        margin: 0;
        padding: 0;
       max-width: 100%;
    }
    body{
        width: 100%;
    }
</style>