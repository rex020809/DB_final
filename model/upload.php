<!-- 把暫存的圖片檔案移到../src/images/product/商品編號/圖片編號.jpg 底下 -->

<?php

    if ($_FILES["file"]["error"] > 0) {
        echo "錯誤代碼 :" . $_FILES["file"]["error"]."<br />";
    }
    else{
        echo "檔案名稱 :" . $_FILES["file"]["error"]."<br />";
        echo "檔案類型 :" . $_FILES["file"]["type"]."<br />";
        echo "檔案大小 :" . ($_FILES["file"]["size"] / 1024) ."Kb <br />";
        echo "暫存名稱 :" . $_FILES["file"]["tmp_name"];

    }

    $path = "../src/images/product/1";
    if(!file_exists($path)){
        mkdir($path, 0777, true);
        echo "建立成功";
        move_uploaded_file($_FILES["file"]["tmp_name"], $path."/".$_FILES["file"]["name"]);
    }
    else{
        echo "建立失敗";
    }

    //header("location: product_upload.php");

?>