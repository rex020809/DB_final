
<html>
    <head>
        <?php require("../model/db_check.php"); ?>
        <?php require('../src/head.php');?>
        <?php require('../model/navbar.php');?>
    </head>

    <body>

        <?php

        if(isset($_SESSION["account"])&& $_SESSION["account"] != "")
        {
           $account = $_SESSION["account"];
        }
        else
        {
            header("Location: ../view/login.php");
        }

        $conn       = db_check();
        $sql        = "SELECT * FROM order_info WHERE buyer = '$account' ORDER BY o_id DESC" ;
        $result     = mysqli_query($conn, $sql);
        $result_num = mysqli_num_rows($result);


        // 如果商城內沒有這個人的購買紀錄 就印出官方回答
        if($result_num == 0)
        {
            echo "之前還沒有買過東西呢! 現在去商城選選吧!";
        }
        // 不然就把歷史紀錄全部列出來(using listview)
        else
        {
        ?>
            <div class = "transaction_list">
                <div class = "title">
                    <p>訂單編號 商品編號 商品名稱 款式 數量 目前進度 交易時間 總價</p>
                </div>

            <?php

            // 取得未完成的訂單資料並逐行列出
            for($i = 0; $i < $result_num; $i++)
            {
                $row = mysqli_fetch_assoc($result);

                if($row['o_prog'] == "未完成")
                {
                    $o_id       = $row['o_id'];
                    $p_id       = $row['p_id'];
                    $p_style    = $row['p_style'];
                    $p_num      = $row['p_num'];
                    $o_prog     = $row['o_prog'];
                    $pay_info   = $row['pay_info'];
                    $o_time     = $row['o_time'];


                    $sql_pname  = "SELECT p_name, price FROM product WHERE p_id = $p_id";
                    $result_pname = mysqli_query($conn, $sql_pname);
                    $row = mysqli_fetch_assoc($result_pname);
                    $p_name = $row['p_name'];
                    $price = $row['price'];

                    $total_price = $p_num * $price;
            ?>
                    <hr>
                    <div class = "column">
                        <p><?php echo $o_id." ".$p_id." ".$p_name." ".$p_style." ".$p_num." ".$o_prog." ".$o_time." ".$total_price; ?> </p>
                    </div>

            <?php
                }
            }
            ?>

            </div>

            <?php

            // 取得已完成的訂單資料並逐行列出
            $result     = mysqli_query($conn, $sql);
            for($i = 0; $i < $result_num; $i++)
            {
                $row = mysqli_fetch_assoc($result);

                if($row['o_prog'] != "未完成")
                {
                    $o_id       = $row['o_id'];
                    $p_id       = $row['p_id'];
                    $p_style    = $row['p_style'];
                    $p_num      = $row['p_num'];
                    $o_prog     = $row['o_prog'];
                    $pay_info   = $row['pay_info'];
                    $o_time     = $row['o_time'];


                    $sql_pname  = "SELECT p_name FROM product WHERE p_id = $p_id";
                    $result_pname = mysqli_query($conn, $sql_pname);
                    $p_name = mysqli_fetch_assoc($result_pname)['p_name'];
            ?>
                    <hr>
                    <div class = "column">
                        <p><?php echo $o_id." ".$p_id." ".$p_name." ".$p_style." ".$p_num." ".$o_prog." ".$o_time; ?> </p>
                    </div>

            <?php
                }
            }
            ?>

            </div>
        <?php
        }
        ?>


    </body>
</html>
