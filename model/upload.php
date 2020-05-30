<!-- 把暫存的圖片檔案移到../src/images/product/商品編號/圖片編號.jpg 底下 -->
<!-- 編號方式：先移動檔案後再重新命名 -->

<?php

    function uploadFiles($path)
    {
        // 計算總共上傳了多少檔案
        $total = count($_FILES["uploadFile"]["name"]);
        echo "檔案數量 :" . $total;

        for($i = 0; $i<$total; $i++)
        {
            // 檢查檔案有沒有損毀
            if($_FILES["uploadFile"]["error"][$i] == 0)
            {
                // 檢查路徑是否存在，如果不存在就新建資料夾
                if(!file_exists($path))
                {
                    mkdir($path, 0777, true);
                }
                
                // 取得上傳之檔案類型
                $filetype = explode('.', $_FILES["uploadFile"]["name"][$i]);

                // 檔案命名&編號
                $file_oldname = $path."/".$_FILES["uploadFile"]["name"][$i];
                $file_newname = $path."/".(string)($i+1).".".$filetype[1];


                // 把暫存檔案儲存至本地資料夾
                move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], $file_oldname);

                // 檔案編號
                rename($file_oldname, $file_newname);
            }
        }

    } 

    
    $path = "../src/images/product/1";
    uploadFiles($path);




 /*
    $total = count($_FILES["uploadFiles"]["name"];)

    foreach($_FILES as $file)

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

    */


    //header("location: product_upload.php");

?>