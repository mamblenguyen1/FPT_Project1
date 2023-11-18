<?php include './Admin/componant/header.php' ?>
<?php include './admin/componant/sidebar.php' ?>
<?
if (isset($_POST['delete_code'])) {
    $code_id = $_POST['CodeID'];
    $code->deleteCode($code_id);
    echo '<script>alert("Đã xóa mã giảm giá ! ! !")</script>';
    echo '<script>window.location.href="index.php?pages=admin&action=CodeList"</script>';
}
?>

<?php include './admin/componant/footer.php' ?>