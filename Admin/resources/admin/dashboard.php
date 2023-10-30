<?php
include './Admin/componant/header.php';
include './Admin/componant/sidebar.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1>Dashboard</h1>
        </div>
        <div class="dashboard-content">
            <div class="static-board">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-comments"></i>
                                </div>
                                <div class="mr-5"><strong>50</strong> phản hồi</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-list"></i>
                                </div>
                                <div class="mr-5"><strong>50</strong> Danh mục</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5"><strong>50</strong> Đơn hàng</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-support"></i>
                                </div>
                                <div class="mr-5"><strong>50</strong> Sản phẩm mới</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <span class="float-left">View Details</span>
                                <span class="float-right">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chart">
                <?php
                $dataPoints = array(
                    array("label" => "Danh mục 1", "y" => 30),
                    array("label" => "Danh mục 2", "y" => 40),
                    array("label" => "Danh mục 3", "y" => 30),
                    array("label" => "Danh mục 4", "y" => 20),
                    array("label" => "Danh mục 5", "y" => 10),
                    array("label" => "Danh mục 6", "y" => 20),
                    array("label" => "Danh mục 7", "y" => 30),
                    array("label" => "Danh mục 8", "y" => 40),
                    array("label" => "Danh mục 9", "y" => 50),
                    array("label" => "Danh mục 10", "y" => 60)
                );
                ?>
                <script>
                    window.onload = function() {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "Số lượng sản phẩm theo danh mục tháng 11"
                            },
                            axisY: {
                                title: "Số lượng bán"
                            },
                            data: [{
                                type: "column",
                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();

                    }
                </script>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

                </html>
            </div>
            <div class="table-order" style="width: 100%;">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title">Thống kê đơn hàng trong tháng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tên khách hàng</th>
                    <th>Số lượng </th>
                    <th>Thời gian đặt</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nguyễn Minh Quang</td>
                    <td>8</td>
                    <td>30/10/2023</td>
                    <td>6.000.000</td>
                    <td>
                        <div class="d-grid gap-2">
                          <button type="button" name="" id="" class="btn btn-primary">Chi tiết</button>
                        </div>
                    </td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>

    </div>
</div>


<?php
include './Admin/componant/footer.php';
?>