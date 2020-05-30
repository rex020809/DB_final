<!DOCTYPE html>
<html>

<body>

    <form action = "../model/upload.php" method = "post" enctype="multipart/form-data">

        檔案名稱:
        <input type = "file" name = "uploadFile[]" id = "" accept="image/jpeg,image/jpg,image/gif,image/png" multiple = "multiple" /> <br />

        <button type="submit" class="btn-block btn-primary" name="submit">上傳</button>
    </form>



</html>