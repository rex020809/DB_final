<!-- 把暫存的圖片檔案移到../src/images/product/商品編號/圖片編號.jpg 底下 -->
<!-- 編號方式：先移動檔案後再重新命名 -->

<?php

    function uploadFiles($conn, $p_id, $path)
    {
        // 計算總共上傳了多少檔案
        $total = count($_FILES["uploadFile"]["name"]);
        echo "檔案數量 :" . $total;

        if($_FILES["uploadFile"]["error"][0] != 4)
        {
            // 刪除本地舊檔案
            $files = glob($path."/*");
            foreach($files as $file)
            {
                if(is_file($file))
                {
                    unlink($file);
                }
            }

            // 刪除資料庫的舊紀錄
            $delete_old_browse = "DELETE FROM product_browse WHERE p_id = '$p_id'";
            mysqli_query($conn, $delete_old_browse);

            for($i = 0; $i<$total; $i++)
            {
                // 檢查檔案有沒有損毀
                if($_FILES["uploadFile"]["error"][$i] == 0)
                {

                    // 取得上傳之檔案類型
                    $filetype = explode('.', $_FILES["uploadFile"]["name"][$i]);

                    $length = count($filetype);
                    // 檔案命名&編號
                    $file_oldname = $path."/".$_FILES["uploadFile"]["name"][$i];
                    $file_newname = $path."/".(string)($i+1).".".$filetype[$length-1];

                    // 把暫存檔案儲存至本地資料夾
                    move_uploaded_file($_FILES["uploadFile"]["tmp_name"][$i], $file_oldname) or die("fuckyourmom");
                    rename($file_oldname, $file_newname) ;

                    // 把圖片資訊上傳至資料庫
                    $product_browse = "INSERT INTO product_browse(p_id, pic_num, pic_src, click_times) VALUES('$p_id', '$i', '$file_newname', 0)";
                    mysqli_query($conn, $product_browse);
                }
                else
                {
                   echo $_FILES["uploadFile"]["error"][$i];
                }
            }
        }

    }


    require("../model/db_check.php");


    $conn = db_check();

    if(isset($_POST['submit']))
    {

        $p_id = $_POST['p_id'];

        $p_name   = stripcslashes($_POST['p_name']);
        $style    = stripcslashes($_POST['style']);
        $category = stripcslashes($_POST['category']);
        $tag      = stripcslashes($_POST['tag']);
        $price    = $_POST['price'];
        $stock    = $_POST['stock'];
        $p_info   = stripcslashes($_POST['p_info']);

        // 上傳商品至資料庫
        $upload = " UPDATE product 
                    SET p_name = '$p_name', style = '$style', category = '$category', tag = '$tag', price = '$price', stock = '$stock', p_info = '$p_info'
                    WHERE p_id = '$p_id'   ";
        mysqli_query($conn, $upload);

        // 上傳圖片至本地及資料庫
        $path = "../src/images/product/".$p_id;
        uploadFiles($conn, $p_id, $path);

       
    }


?>

    <a href = "../view/product_data.php"> 回商品管理 </a>;
<?php


?>
