<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_POST['details'])) {
    $contact_id = $_POST['contact_id'];
};
?>

<?
if (isset($_POST['restore'])) {
    $contact->restore_contact($_POST['contact_id']);
    echo '<script>window.location.href="index.php?pages=admin&action=ContactSpam"</script>';
}
?>
<?
if (isset($_POST['spam'])) {
    $contact->hide_contact($_POST['contact_id']);
    echo '<script>window.location.href="index.php?pages=admin&action=Contact"</script>';
}
?>
<?
if (isset($_POST['delete'])) {
    $contact->delete_contact($_POST['contact_id']);
    echo '<script>window.location.href="index.php?pages=admin&action=Contact"</script>';
}
?>
<?
if (isset($_POST['reply'])){
    echo '<script>window.location.href="index.php?pages=admin&action=ContactReply&contact_id='.$_POST['contact_id'].'"</script>';
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Xem chi tiết</h1>
        </div>
        <div class="container-fluid" style="padding:30px">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Đọc thư liên hệ</h3>
                </div>
                <?
                $sql = $contact->show_contact_detail($contact_id);
                extract($sql);
                ?>
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <h5><b>Chủ đề: </b><?= $subject ?></h5>
                        <h6>Đến từ: <?= $name ?>
                            <span class="mailbox-read-time float-right"><?= $timecount->timeformatter($date) ?></span>
                        </h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <!-- <div class="mailbox-controls with-border text-center">
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
                        <button type="button" class="btn btn-default btn-sm" title="Print">
                            <i class="fas fa-print"></i>
                        </button>
                    </div> -->
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                        <p><?= $content ?></p>
                    </div>
                    <!-- /.mailbox-read-message -->
                </div>



                <!-- /.card-header -->

                <!-- /.card-body -->
                <!-- /.card-footer -->
                <form action="" method="post">
                    <div class="card-footer">
                        <div class="float-right">
                            <button name="reply" type="submit" class="btn btn-default"><i class="fas fa-reply"></i> Trả lời</button>
                            <button name="spam" type="submit" class="btn btn-default"><i class="fas fa-share"></i> Chuyển vào hòm thư ẩn</button>
                        </div>
                        <input type="hidden" value="<?= $contact_id ?>" name="contact_id">
                        <button name="delete" type="submit" class="btn btn-default"><i class="far fa-trash-alt"></i> Xoá vĩnh viễn thư </button>
                    </div>
                </form>
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