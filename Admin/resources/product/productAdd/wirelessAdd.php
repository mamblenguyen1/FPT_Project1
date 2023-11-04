<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Thêm Sản Phẩm Theo Danh Mục</h1>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <?
                                $row = $product->wireless_select_all();
                                foreach ($row as $ketqua) {
                                    extract($ketqua);
                                ?>
                                    <form action="index.php?pages=admin&action=<? echo $wire_url ?>" style="display: inline-block;" method="post">
                                        <input type="hidden" name="category_id" value="<?= $category_id ?>">
                                        <input type="hidden" name="is_wireless_id" value="<?= $is_wireless_id ?>">
                                        <button type="submit" class="btn btn-outline-primary" name="addproduct"><? echo $is_wireless_name ?></button>
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