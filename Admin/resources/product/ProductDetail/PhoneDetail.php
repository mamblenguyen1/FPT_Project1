<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['detail'])) {
    $product_id = $_POST['product_id'];
}
if (isset($_POST['deleteproduct'])) {
    $product_id = $_POST['product_id'];
    $product->deleteproduct($product_id);
    echo '<script>alert("Đã xóa sản phẩm thành công ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=listpro"</script>';
}
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
                                <h1 style="padding-left: 30px;">Chi tiết sản phẩm điện thoại</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Mô tả</th>
                                            <th>Thông số kỹ thuật</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                        <? $conn = $db->pdo_get_connection();
                                        $stmt = $conn->prepare("SELECT * FROM product
                                         WHERE is_deleted = 1
                                         AND product_id = $product_id
                                         ");
                                        $stmt->execute();
                                        if ($stmt->rowCount() > 0) {
                                            foreach ($stmt as $row) {
                                                echo '
                                        

                                        <tr>
                                            <td>' . $row['product_name'] . '</td>
                                            <td> <img src="images/' . $row['product_img'] . '" alt="">
                                            </td>
                                            <td>' . $row['product_title'] . '</td>
                                            <td>
                                                <p>Màn Hình: ' . $row['phone_screen'] . '</p>
                                                <p>Cam trước: ' . $row['phone_frontcam'] . '</p>
                                                <p>Cam sau: ' . $row['phone_backcam'] . '</p>
                                                <p>Chip: ' . $row['phone_chip'] . '</p>
                                                <p>RAM: ' . $row['phone_ram'] . '</p>
                                                <p>Dung lượng: ' . $row['phone_storge'] . '</p>
                                            </td>

                                        </tr>
                                       
';
                                            }
                                            
                                        } 
                                        ?>
                                    </tbody>
                                  
                                </table>
                                <?
                                        echo '
<form action="" method="post">
<input type="hidden" name="product_id" value="' . $row['product_id'] . '">
<button type="submit" name="editproduct" class="btn  btn-outline-primary">Chỉnh Sửa</button>
<button type="submit" name="deleteproduct" class="btn  btn-outline-danger">Xóa</button>
</form>
';
                                        ?>
                            
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php include './admin/componant/footer.php' ?>