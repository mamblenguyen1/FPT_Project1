<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>


<?
if (isset($_POST['add'])) {
    $product_description = $_POST['product_description'];
    print_r($product_description);
}
?>
<form action="" method="post">
    <div class="mb-3">
        <label for="" class="form-label">Thông số kĩ thuật</label>
        <textarea name="product_description" id="editor">
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
        </tbody>
    </table>
    </textarea>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    </div>
    <button type="submit" name="add">Thêm</button>
</form>