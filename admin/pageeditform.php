<?php
if(isset($_GET['pageid'])){
    $pageid=$_GET['pageid'];
    $sql="select*from tbl_page where pageid=$pageid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

//include '../GlobalClass/Product.php';
include '../library/img.php';
$tbl = "tbl_page"
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Page Edit Form</h4>

    <form action="index.php?p=contactus&action=1&pageid=<?=$pageid?>" method="post" enctype="multipart/form-data" >
        <label for="texttitle" class="form-label" >Titile</label>
        <input type="text" class="form-control" id="txttile" name="txttile"value="<?=$row['pagetitle']?>">
        <label for="txtcontent" class="form-label" >Content</label>
        <textarea class="form-control" id="txtcontent" name="txtcontent" row="3"><?=$row['pagecontent']?></textarea>

        <button type="submit" class="btn btn-primary"> Update</button>
        <a href="index.php?p=contactus" class="btn btn-secondary"> Cancel </a>

    </form>

</div>
<script>
    tinymce.init({
            selector: '#txtcontent',
            height: 500,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    automatic_uploads: true,
                    file_picker_types: 'image',
                    file_picker_callback: function (cb, value, meta) {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');
                        input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function () {
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
                            cb(blobInfo.blobUri(), { title: file.name });
                        };
                        reader.readAsDataURL(file);
                        };

                        input.click();
                    },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>
<?php
}
else{

?>
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Error-404 page not found</h4>
</div>
<?php
}
?>