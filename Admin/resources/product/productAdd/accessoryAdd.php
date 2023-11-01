<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Thêm Phụ Kiện</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <?
                                $row = $product->category_select_all();
                                foreach ($row as $ketqua) {
                                    extract($ketqua);
                                ?>
                                    <?
                                    if ($category_id == 1) {
                                        $url = 'AddWiredheadphones';
                                        $namebtn = 'Thêm Tay Nghe Có Dây';
                                    } else if ($category_id == 2) {
                                        $url = 'AddWirelessheadphones';
                                        $namebtn = 'Thêm Tay Nghe Không Dây';
                                    } else if ($category_id == 3) {
                                        $url = 'AddBatterybackup';
                                        $namebtn = 'Thêm Pin Dự Phòng';
                                    } else if ($category_id == 4) {
                                        $url = 'AccessoryAdd';
                                        $namebtn = 'Thêm Chuột Có Dây';
                                    } else {
                                        $url = 'AccessoryAdd';
                                        $namebtn = 'Thêm Chuột Không Dây ';
                                    }
                                    ?>
                                    <form action="index.php?pages=admin&action=<? echo $url ?>" style="display: inline-block;" method="post">
                                        <input type="hidden" name="category_id" value="<?= $category_id ?>">
                                        <button type="submit" class="btn btn-outline-primary" name="addproduct"><? echo $namebtn ?></button>
                                    </form>
                                <?
                                }
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