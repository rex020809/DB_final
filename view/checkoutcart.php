
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <?php require('../model/db_check.php'); ?>
        <?php require('../src/head.php')?>
        <link rel=stylesheet type="text/css" href="../src/css/check.css?v=<?=time()?>">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>


        <div id="cart">
            <?php
                session_start();
                $conn = db_check();
                for($i=0;$i<sizeof($_SESSION['chart_id']);$i++){
                    $nav_id=$_SESSION['chart_id'][$i];
                    $nav_var="SELECT p_name , pic_src FROM product AS p1, product_browse AS p2 WHERE p1.p_id='$nav_id' AND p2.p_id=p1.p_id";
                    $nav_result=mysqli_query($conn,$nav_var);
                    $nav_row=mysqli_fetch_assoc($nav_result);
                    $nav_pname=$nav_row['p_name'];
                    $nav_img=$nav_row['pic_src'];
            ?>
            <div class="nav-cart">
                <input type="checkbox" name="id[]" value="<?=$nav_id?>">
                <img src="<?=$nav_img?>" alt="fuck" >
                <p class="cart_pname">
                    <?php echo $nav_pname?>
                </p>
                <p class="cart_num">
                    <?php echo "數量：".$_SESSION['chart_num'][$i].'<br>';?>
                </p>
            </div>
            <hr>

            <?php
                }
            ?>
        </div>
    </body>
</html>
