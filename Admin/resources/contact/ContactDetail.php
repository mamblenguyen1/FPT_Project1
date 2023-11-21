<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['details'])) {
    $contact_id = $_POST['contact_id'];
};
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Xem chi tiết</h1>
        </div>
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>

                    <div class="card-tools">
                        <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <?
                $sql = $contact->show_contact_detail($contact_id);
                extract($sql);
                ?>
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5><b>Chủ đề </b><?=$subject?></h5>
                        <h6>From: <?=$name?>
                            <span class="mailbox-read-time float-right"><?=$date?></span>
                        </h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                                <i class="far fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                                <i class="fas fa-reply"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                                <i class="fas fa-share"></i>
                            </button>
                        </div>
                        <!-- /.btn-group -->
                        <button type="button" class="btn btn-default btn-sm" title="Print">
                            <i class="fas fa-print"></i>
                        </button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p><?=$content?></p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>



                <!-- /.card-header -->

                <!-- /.card-body -->
                <!-- /.card-footer -->
                <div class="card-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                        <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
</div>
</div>


<?php include './admin/componant/footer.php' ?>