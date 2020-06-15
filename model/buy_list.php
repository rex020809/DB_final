<?php

    require("db_check.php");
    session_start();

    if(isset($_SESSION["account"])&& $_SESSION["account"] != "")
    {
        $account = $_SESSION["account"];
    }
    else
    {
        header("Location: ../view/login.php");
    }
    
?>

<html>
    <head>
        <?php require('../src/head.php')?>
    </head>

    <body>

        <?php

        // 目前購物車內的部分



        // 歷史購買部分
        $conn       = db_check();
        $sql        = "SELECT * FROM order_info WHERE buyer = $account " ;
        $result     = mysqli_query($conn, $sql);
        $result_num = mysqli_num_rows($result);


        // 如果商城內沒有這個人的購買紀錄 就印出官方回答
        if($result_num != NULL && $result_num == 0)
        {
            echo "之前還沒有買過東西呢! 現在去商城選選吧!";
        }
        // 不然就把歷史紀錄全部列出來(using listview)
        else
        {
        ?>
            <div class = "transaction_list">
                <div class = "title">
                    <p>訂單編號 商品編號 商品名稱 款式 數量 目前進度 交易時間</p>
                </div>

            <?php

            // 逐筆取得資料並逐行列出
            for($i = 0; $i < $result_num; $i++)
            {
                $row = mysqli_fetch_assoc($result);
                
                $o_id       = $row['o_id'];
                $p_id       = $row['p_id'];
                $p_style    = $row['p_style'];
                $p_num      = $row['p_num'];
                $o_prog     = $row['o_prog'];
                $pay_info   = $row['pay_info'];
                $o_time     = $row['o_time'];

                $sql_pname  = "SELECT p_name FROM product WHERE p_id = $p_id";
                $result_pname = mysqli_query($conn, $sql_pname);
                $p_name = mysqli_fetch_assoc($result)['p_name'];
            ?>

               <div class = "column">
                    <p><?php echo $o_id." ".$p_id." ".$p_name." ".$p_style." ".$p_num." ".$o_prog." ".$o_time; ?> </p>
                </div>

            <?php
            }
            ?>

            </div>
        <?php
        }
        ?>

    </body>
</html>