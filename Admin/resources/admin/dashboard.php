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
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <div class="mr-5"><strong><? echo $user->Countuser() ?></strong> Tài khoản</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <a href="index.php?pages=admin&action=UserList" style="margin: 0 auto"><span class="float-left">Xem Ngay </span></a>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-list"></i>
                                </div>

                                <div class="mr-5"><strong><? echo $category->Countcategory() ?></strong> Danh mục</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <a href="index.php?pages=admin&action=listcate" style="margin: 0 auto"><span class="float-left">Xem Ngay </span></a>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="card text-white bg-success o-hidden h-100">
                            <div class="card-body">
                                <div class="card-body-icon">
                                    <i class="fa fa-fw fa-shopping-cart"></i>
                                </div>
                                <div class="mr-5"><strong><? echo $product->CountProducts() ?></strong> Sản phẩm</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                                <a href="index.php?pages=admin&action=productList" style="margin: 0 auto"><span class="float-left">Xem Ngay </span></a>
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
                                <a href="index.php?pages=admin&action=productList" style="margin: 0 auto"><span class="float-left">Xem Ngay </span></a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chart">
                <?php
                $dataPoints = array(
                    array("label" => "Tháng 1", "y" => $comment->CountDetailsOfMonth(1)),
                    array("label" => "Tháng 2", "y" => $comment->CountDetailsOfMonth(2)),
                    array("label" => "Tháng 3", "y" => $comment->CountDetailsOfMonth(3)),
                    array("label" => "Tháng 4", "y" => $comment->CountDetailsOfMonth(4)),
                    array("label" => "Tháng 5", "y" => $comment->CountDetailsOfMonth(5)),
                    array("label" => "Tháng 6", "y" => $comment->CountDetailsOfMonth(6)),
                    array("label" => "Tháng 7", "y" => $comment->CountDetailsOfMonth(7)),
                    array("label" => "Tháng 8", "y" => $comment->CountDetailsOfMonth(8)),
                    array("label" => "Tháng 9", "y" => $comment->CountDetailsOfMonth(9)),
                    array("label" => "Tháng 10", "y" => $comment->CountDetailsOfMonth(10)),
                    array("label" => "Tháng 11", "y" => $comment->CountDetailsOfMonth(11)),
                    array("label" => "Tháng 12", "y" => $comment->CountDetailsOfMonth(12))
                );
                ?>
                <script>
                    window.onload = function() {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "Thống kê số bình luận theo tháng"
                            },
                            axisY: {
                                title: "Số lượng bình luận"
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
            </div>
            <div class="table-order" style="width: 100%;">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <h3 class="">Tổng số đơn hàng đang chờ xử lí</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Thời gian đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                $sql = $order->Show_Order_in_use();
                                foreach ($sql as $row) {
                                    extract($sql);
                                    echo '
                                        <tr>
                                            <td>'.$row['cart_id'].'</td>
                                            <td>' .$row['user_name']. '</td>
                                            <td>'.$row['date'].'</td>
                                            <td>'.number_format($row['total_price']).'đ</td>
                                            <td>
                                            <form action="index.php?pages=admin&action=OrderDetailList" method="post">
                                            <input type="hidden" value="' . $row['cart_id'] . '" name="cart_id">
                                            <button type="submit" name="detail_order" class="btn  btn-outline-primary">Chi tiết</button>
                                        </form>
                                            </td>
                                        </tr>
                                    ';
                                }
                                ?>
                            </tbody>
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