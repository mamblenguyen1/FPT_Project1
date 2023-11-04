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
                    $stmt = $conn->prepare("SELECT product_id, product_name , category_id , type_id , product_price FROM phone
                    WHERE is_deleted = 1
                    UNION
                    SELECT product_id,product_name , category_id , type_id , product_price FROM laptop
                    WHERE is_deleted = 1
                    UNION
                    SELECT product_id,product_name , category_id , type_id , product_price  FROM wired
                    WHERE is_deleted = 1
                    UNION
                    SELECT product_id,product_name , category_id , type_id , product_price FROM wireless                    
                    WHERE is_deleted = 1");
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                      foreach ($stmt as $row) {
                       
                        if($row['category_id'] == 1 ){
                          $TypeName = $product->getTypeNamePhone($row['product_id'], 'type_name');
                          $CategoryName = $product->getTypeNamePhone($row['product_id'], 'category_name');
                          $product_url = $product->getTypeNamePhone($row['product_id'], 'url');
                        }else if($row['category_id'] == 2){
                          $TypeName = $product->getTypeNameLaptop($row['product_id'], 'type_name');
                          $CategoryName = $product->getTypeNameLaptop($row['product_id'], 'category_name');
                          $product_url = $product->getTypeNameLaptop($row['product_id'], 'url');

                        } else if($row['category_id'] == 3){
                          if(($product->getIsWired($row['product_id'], 'is_wireless')) == 1 || ($product->getIsWireLess($row['product_id'], 'is_wireless')) == 1){
                            $TypeName = $product->getIsWired($row['product_id'], 'typename');
                            $CategoryName = $product->getIsWired($row['product_id'], 'catename');
                            $product_url = $product->getIsWired($row['product_id'], 'url');
                          }else{
                            $TypeName = $product->getIsWireLess($row['product_id'], 'typename');
                            $CategoryName = $product->getIsWireLess($row['product_id'], 'catename');
                            $product_url = $product->getIsWireLess($row['product_id'], 'url');
                          }
                        }
                        // $TypeName = $product->getTypeName($row['product_id'], 'type_name');
                        // $CateName = $product->getCateName($row['product_id'], 'category_name');
                        echo ' 
                                                <tr>
                                                <td>' . $row['product_name'] . '</td>
                                                <td>' .  $CategoryName . '</td>
                                                <td>' . $TypeName . '</td>
                                                <td>' . $row['product_price'] . '</td>
                                                <td>
                                                  <form action="?pages=admin&action='.$product_url.'" method="post">
                                                    <input type="hidden" value="' . $row['product_id'] . '" name="product_id">
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