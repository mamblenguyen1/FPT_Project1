<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<?
if (isset($_POST['addProductbtn'])) {
    $category_id = $_POST['category_id'] ?? "";
    $product_name = $_POST['product_name'] ?? "";
    $product_price = $_POST['product_price'] ?? "";
    $product_sale = $_POST['product_sale'] ?? "";
    $product_quantily = $_POST['product_quantily'] ?? "";
    $type_id = $_POST['type_id'] ?? "";
    $product_description = $_POST['product_description'] ?? "";
    $product_short_description = $_POST['product_short_description'] ?? "";
    $product_img  = $_FILES['product_img']['name'] ?? "";
    $user_created = $_COOKIE['userID'];

    if (
        !$category_id == "" &&
        !$product_name == "" &&
        !$product_price == "" &&
        $product_price > 1000 &&
        $product_sale > 0 &&
        $product_sale < 100 &&
        !$product_sale == "" &&
        !$product_quantily == "" &&
        !$type_id == "" &&
        !$user_created == "" &&
        !$product_img == "" &&
        !$product_description == "" &&
        !$product_short_description == ""

    ) 
    {
        if ($product->checkDuplicateProduct(trim($product_name),$type_id, $category_id)) {
            echo '
                <script>
                    Toastify({
                        text:"Sản Phẩm Đã Tồn Tại !!!",
                        duration: 3000,
                        gravity: "top",
                        backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                        position: "center",
                        stopOnFocus: true,
                        close: true, // Cho phép đóng toast bằng cách nhấp vào
                        style: {
                            // Các thuộc tính CSS để tùy chỉnh hơn
                            fontSize:"23px",
                            padding:"20px",
                        },
                    }).showToast();
                </script>';
        } else { 
                $product->add_product($product_name, $product_price, $product_sale, $product_img, $product_quantily, $category_id, $type_id, $product_short_description, $product_description, $user_created);
                echo '
                    <script>
                        Toastify({
                            text: "Thêm Sản Phẩm Thành Công !!!",
                            duration: 3000,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "#28a745", // Màu nền của toast khi điều kiện đúng
                            stopOnFocus: true,
                            close: true, // Cho phép đóng toast bằng cách nhấp vào
                            className: "toastify-custom", // Thêm lớp CSS tùy chỉnh
                            style: {
                                fontSize:"23px",
                                padding:"20px",
                            },
                        }).showToast();
                    </script>';
                $anhne = $_FILES['product_img']['tmp_name'];
                $error = $_FILES['product_img']['error'];
                $path = 'images/product/' . $product_img . '.png';
                if (
                    $error === 0
                ) {
                    move_uploaded_file($anhne, $path);
                }
            }
    }   else {
            echo '
                <script>
                    Toastify({
                        text:"Xin vui lòng nhập đủ thông tin !!!",
                        duration: 3000,
                        gravity: "top",
                        backgroundColor: "#dc3545", // Màu nền của toast khi điều kiện đúng
                        position: "center",
                        stopOnFocus: true,
                        close: true, // Cho phép đóng toast bằng cách nhấp vào
                        style: {
                            fontSize:"23px",
                            padding:"20px",
                        },
                    }).showToast();
                </script>';
    }
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">THÊM SẢN PHẨM</h1>
        </div>
        <div class="add-cate-form">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm sản phẩm mới vào hệ thống !!!</h3>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- Tên Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản phẩm </label><input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm . . .">
                            <?
                            if (isset($_POST["product_name"])) {
                                if (empty($_POST["product_name"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên Laptop </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>


                        <!-- giá Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                            <input name="product_price" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm . . .">
                            <?
                            if (isset($_POST["product_price"])) {
                                if (empty($_POST["product_price"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập giá sản phẩm </span>';
                                } else {
                                    if(($_POST["product_price"]) < 1000){
                                        echo '<span class="vaild">Giá sản phẩm phải lớn hơn 1000 VND </span>';

                                    }else{
                                        echo '';

                                    }
                                }
                            }
                            ?>
                        </div>

                        <!-- giá giảm Laptop -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phần trăm giảm giá </label>
                            <input name="product_sale" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm sau khi giảm. . .">
                            <?
                            if (isset($_POST["product_sale"])) {
                                if (empty($_POST["product_sale"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập phần trăm giá giảm của sản phẩm </span>';
                                } else {
                                    if(($_POST["product_sale"]) < 0 && ($_POST["product_sale"]) > 100){
                                    echo '<span class="vaild">Phẩn trăm giảm giá phải lớn hơn 0 và bé hơn 100 </span>';
                                    }else{
                                        echo '';

                                    }
                                }
                            } ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả ngắn sản phẩm </label>
                            <input name="product_short_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập mô tả ngắn. . .">
                            <?
                            if (isset($_POST["product_short_description"])) {
                                if (empty($_POST["product_short_description"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập giá giảm của sản phẩm </span>';
                                } else {
                                    echo '';
                                }
                            } ?>
                        </div>
                        <!-- số lượng Laptop nhập-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng </label>
                            <input name="product_quantily" type="number" class="form-control" id="exampleInputEmail1" placeholder="Nhập số lượng. . .">
                            <?
                            if (isset($_POST["product_quantily"])) {
                                if (empty($_POST["product_quantily"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập số lượng </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <!-- hình ảnh sản phẩm -->

                        <input type="file" accept=".jpg, .jpeg, .png" name="product_img" id="">
                        <?
                        if (isset($_FILES['product_img']['name'])) {
                            if (empty($_FILES['product_img']['name'])) {
                                echo '<br/>';
                                echo '<span class="vaild">Xin vui lòng chọn ảnh </span>';
                            } else {
                                echo '';
                            }
                        }
                        ?>

                        <!-- hãng sản phẩm -->
                        <div class="form-group">
                            <label>Danh mục sản phẩm : </label>
                            <select name="category_id" id="category" class="form-control select2" style="width: 100%;">
                                <option selected value="0">Chọn Danh mục</option>
                            </select>
                            <?
                            if (isset($_POST["category_id"])) {
                                if (empty($_POST["category_id"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Hãng sản phẩm</label>
                            <select name="type_id" id="type" class="form-control select2" style="width: 100%;">
                                <option selected value="0">Chọn hãng</option>
                            </select>
                            <?
                            if (isset($_POST["type_id"])) {
                                if (empty($_POST["type_id"])) {
                                    echo '<span class="vaild">Xin vui lòng nhập tên danh mục </span>';
                                } else {
                                    echo '';
                                }
                            }
                            ?>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Thông số kĩ thuật</label>
                            <textarea name="product_description" id="editor">
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#editor'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" onclick="showToast()" name="addProductbtn" class="btn btn-primary">Thêm sản phẩm</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './admin/componant/footer.php' ?>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "./admin/resources/product/category.php",
            dataType: 'json',
            success: function(data) {
                $("#category").html("");
                for (i = 0; i < data.length; i++) {
                    var category = data[i]; //vd  {idTinh:'6', loai:'Tỉnh', tenTinh:'Bắc Kạn'}
                    var str = ` 
                <option value="${category['category_id']}"> ${category['category_name']} </option>
                   `;
                    $("#category").append(str);
                }
                $("#category").on("change", function(e) {
                    layHuyen();
                });
            }
        });
    })
</script>
<script>
    function layHuyen() {
        var category_id = $("#category").val();
        $.ajax({
            url: "./admin/resources/type/type.php?category_id=" + category_id,
            dataType: 'json',
            success: function(data) {
                $("#type").html("");
                for (i = 0; i < data.length; i++) {
                    var type = data[i];
                    var str = ` 
                <option  value="${type['type_id']}">${type['type_name']} </option>`;
                    $("#type").append(str);
                }
            }
        });
    }
</script>
<script>
  function showToast(isSuccess) {
    if (isSuccess) {
      toast({
        title: "Thành công!",
        message: "Bạn đã đăng ký thành công tài khoản tại F8.",
        type: "success",
        duration: 5000
      });
    }
    else {
      toast({
        title: "Thất bại!",
        message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
        type: "error",
        duration: 5000
      });
    }
  }
  // Toast function
  function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
      const toast = document.createElement("div");

      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);

      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };

      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);

      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }

</script>