<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['CommentReply'])) {
    $comment_detail = $_POST['comment_detail_id'];
};
if(isset($_POST['Replycomment'])){
    $comment_detail_id = $_POST['comment_detail_id'];
    $replyContent = $_POST['replyContent'];
    if($comment_detail_id != "" && $replyContent != ""){
        $comment->Reply_comment($comment_detail_id, $replyContent);
        echo '<script>window.location.href="index.php?pages=admin&action=commentList"</script>';
    }
}

?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h2 style="padding-left: 30px;">Trả lời bình luận</h2>
        </div>
        <section class="content">
            <div class="comment">
                <p> <?= $comment->getInfoCommentDetail($comment_detail,'user_name')?></p>
                <div class="reply">
                    <p> <?= $comment->getInfoCommentDetail($comment_detail,'comment_content')?></p>
                </div>
                <div class="">
                    <p style="margin-left: 10%; float:right"><?= $comment->getInfoCommentDetail($comment_detail,'comment_date')?></p>
                    <br>
                </div>
            </div>
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <textarea class="form-control" rows="5" name="replyContent" placeholder="Nhập ở đây......."></textarea>
                    <input type="hidden" name="comment_detail_id" value="<?= $comment_detail ?>">
                </div>
                <button type="" class="btn btn-primary" style="float:right;" name="Replycomment">Gửi</button>
            </form>
        </section>
    </div>
</div>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .comment {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }
    .reply {
        margin-left: 20px;
        border-left: 1px solid #ccc;
        padding-left: 10px;
    }
</style>
<?php include './admin/componant/footer.php' ?>