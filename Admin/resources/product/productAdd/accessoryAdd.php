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
                                $row = $type->type_select_all();
                                foreach ($row as $ketqua) {
                                    extract($ketqua);
                                ?>
                                    <form action="index.php?pages=admin&action=<?echo $urlAdd?>" style="display: inline-block;" method="post">
                                        <input type="hidden" name="category_id" value="<?= $type_id?>">
                                        <button type="submit" class="btn btn-outline-primary" name="addproduct"><?echo $type_name?></button>
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