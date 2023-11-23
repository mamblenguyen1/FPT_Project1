<?php include './Admin/componant/header.php' ?>

<?php include './admin/componant/sidebar.php' ?>

<?
if (isset($_GET['contact_id'])) {
    $contact_id = $_GET['contact_id'];
};

$sql = $contact->show_contact_detail($contact_id);
extract($sql);
?>

<?
if (isset($_POST['send'])) {
    $addressMail = $_POST['mail'];
    $user_name = $_POST['user_name'];
    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $mail->ReplyMail($user_name, $addressMail, $subject, $question, $answer);
}
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 style="padding-left: 30px;">Phản hồi thư</h1>
        </div>
        <div class="container-fluid" style="padding:30px">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Viết thư mới</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" method="post">
                        Tên khách hàng :
                        <input class="form-control" name="user_name" placeholder="Người nhận:" value="<?= $name ?>">
                        <div class="form-group">
                            Mail người nhận :
                            <input class="form-control" name="mail" placeholder="Người nhận:" value="<?= $email ?>">
                        </div>
                        <div class="form-group">
                            Chủ đề câu hỏi :
                            <input class="form-control" name="subject" placeholder="Chủ đề:" value="<?= $subject ?>">
                        </div>
                        <div class="form-group">
                            Câu hỏi của khách hàng :
                            <textarea id="compose-textarea" name="question" class="form-control" style="height: 80px"><?= $content ?></textarea>
                        </div>
                        <div class="form-group">
                            Câu trả lời từ người quản trị :
                            <textarea id="compose-textarea" name="answer" class="form-control" style="height: 300px"></textarea>
                        </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                        <button type="submit" name="send" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                    </div>
                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                </div>
                </form>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
</div>
</div>


<?php include './admin/componant/footer.php' ?>