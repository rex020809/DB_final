<!-- 把暫存的圖片檔案移到../src/images/product/商品編號/圖片編號.jpg 底下 -->
<!-- 編號方式：先移動檔案後再重新命名 -->

<?php

    function uploadFiles($conn, $p_id, $path)
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

                    mkdir($path, 0700, true);

                }

                // 取得上傳之檔案類型
                $filetype = explode('.', $_FILES["uploadFile"]["name"][$i]);

                // 檔案命名&編號
                $file_oldname = $path."/".$_FILES["uploadFile"]["name"][$i];
                $file_newname = $path."/".(string)($i+1).".".$filetype[1];


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


    require("../model/db_check.php");


    $conn = db_check();

    if(isset($_POST['submit']))
    {

        /* 找編號的方法待定 我先隨便用一個 */
        // 從資料庫讀最大的編號再 + 1
        $result = mysqli_query($conn, "SELECT MAX(p_id) FROM product");
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $p_id = $row['MAX(p_id)'] + 1;

        $p_name   = stripcslashes($_POST['p_name']);
        $style    = stripcslashes($_POST['style']);
        $category = stripcslashes($_POST['category']);
        $tag      = stripcslashes($_POST['tag']);
        $price    = $_POST['price'];
        $stock    = $_POST['stock'];
        $p_info   = stripcslashes($_POST['p_info']);

        // 上傳商品至資料庫
        $upload = "INSERT INTO product(p_id, p_name, style, category, tag, price, stock, p_info) VALUES('$p_id', '$p_name', '$style', '$category', '$tag', '$price', '$stock', '$p_info')";
        mysqli_query($conn, $upload);

        // 上傳圖片至本地及資料庫
        $path = "../src/images/product/".$p_id;
        uploadFiles($conn, $p_id, $path);

        //header("location: ../view/plist.php");
    }






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




?>
