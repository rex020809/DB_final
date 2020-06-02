<link rel="stylesheet" type = "text/css" href="../src/css/nav.css">
<script src ="../view/navbar/navbar_script.js"></script>


<?php session_start() ?>
<!-- 搜尋欄navbar (會黏在最上層) -->
<div class = "topnav">

    <nav class = "navbar bg-navbar ">

        <a class = "nav-brand" href="../view/plist.php">
          <img src = "../src/images/logo.png" style="width:230px;">
        </a>

        <!-- SearchBox -->
        <form class = "form-inline">

            <input type ="text" name = "search" placeholder = " 搜尋商品" style ="width:50vw">

            <input type ="submit" value = "搜尋">

        </form>


        <!-- 跟登入有關的東西寫在這塊底下 -->
        <div class = "nav-right">

          <div class = "dropdown">

            <a class = "h float-right" href = "#">
              <i class = "fas fa-shopping-cart"></i>
            </a>

            <!-- 這裡放被加入購物車內的商品清單(讀取cookie資訊) -->
            <div class = "dropdown-content dropdown-menu dropdown-menu-right dropdown-shoppingcart">
              <!-- <?php // require("../model/shoppingcart.php") shopping_cart() ?>  -->
              <li>購物車裡面空空的fdsaffdsafs</li>
            </div>

          </div>


          <?php
            if(!isset($_SESSION['isLogin'])){
            ?>

            <!-- 如果還沒登入則顯示登入按鈕 -->
            <a class = "float-right" href = "../view/login.php">登入</a>

            <?php
            }
            else{
            ?>

            <!-- 不然就顯示使用者名稱&登出 -->
            <div class = "dropdown">
              <a class = "float-right" href = "#">
                <?php if(isset($_SESSION['name']) && $_SESSION['name'] != null) { echo "HI, " . $_SESSION['name']; } ?>
              </a>
              <div class = "dropdown-content dropdown-menu dropdown-menu-right dropdown-shoppingcart">
                <li>姓名： <?php echo $_SESSION['name']; ?></li>
                <li>帳號： <?php echo $_SESSION['account']; ?></li>
                <li>信箱： <?php echo $_SESSION['email']; ?></li>
                <li>手機： <?php echo $_SESSION['c_num']; ?></li>

                <a class = "float-right" href = "../view/reset_password.php">
                  <li> 修改密碼 </li>
                </a>
              </div>
            </div>
            <a class = "float-right" href = "../model/logout.php">登出</a>

            <?php
            }
          ?>

        </div>

    </nav>

</div>
