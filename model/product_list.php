<?php

    require("../model/db_check.php");
    $conn       = db_check();
    $sql        = "SELECT * FROM product ORDER BY CAST(p_id AS SIGNED) ASC";
    $result     = mysqli_query($conn, $sql);
    $result_num = mysqli_num_rows($result);
    
?>

    <div class = "product_list">
        <div class = "title">
            <p> 商品編號 商品名稱  </p>
        </div>

<?php
    if($result_num == 0)
    {
        echo "目前沒有商品資料";
    }
    else
    {
        for($i = 0; $i < $result_num; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            
            $p_id       = $row['p_id'];
            $p_name     = $row['p_name'];

?>
        <hr>
        <div class = "column">
            <p><?php echo "$p_id".".$p_name.";?> <a href = "../model/product_edit.php?p_id=<?php echo $row['p_id'] ?>"> 編輯 </a></p>
        </div>

<?php


        }
    }

?>

    </div>

<?php


?>