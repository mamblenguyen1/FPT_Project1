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
                                    if($category_id == 1 || $category_id == 2){
                                        ?>
                                        <form action="index.php?pages=admin&action=<?echo $urlAdd?>" style="display: inline-block;" method="post">
                                            <input type="hidden" name="category_id" value="<?= $category_id?>">
                                            <button type="submit" class="btn btn-outline-primary" name="addproduct"><?echo $category_display?></button>
                                        </form>
                                    <?
                                    }else if($category_id == 3){
                                        ?>
                                        <form action="index.php?pages=admin&action=wireless" style="display: inline-block;" method="post">
                                            <input type="hidden" name="category_id" value="<?= $category_id?>">
                                            <button type="submit" class="btn btn-outline-primary" name="addproduct"><?echo $category_display?></button>
                                        </form>
                                    <?
                                    }else{
                                        ?>
                                        <form action="index.php?pages=admin&action=anotherCate" style="display: inline-block;" method="post">
                                            <input type="hidden" name="category_id" value="<?= $category_id?>">
                                            <button type="submit" class="btn btn-outline-primary" name="addproduct"><?echo $category_display?></button>
                                        </form>
                                    <?
                                    }
                            
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