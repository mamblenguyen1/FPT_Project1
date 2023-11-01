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
                                $row = $product->category_select_all();
                                foreach ($row as $ketqua) {
                                    extract($ketqua);
                                ?>
                                    <button type="button" class="btn btn-outline-primary"><a href="?pages=admin&action=">Thêm <?= $category_name ?></a></button>
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