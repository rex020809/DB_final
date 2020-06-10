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
        <form class = "form-inline" method="GET" action="plist.php">

            <input type ="text" name = "search" placeholder = " 搜尋商品" style ="width:50vw">

            <input type ="submit" value = "搜尋">

        </form>


        <!-- 跟登入有關的東西寫在這塊底下 -->
        <div class = "nav-right">

          <div class = "dropdown">

            <a class = "h float-right" href = "#">
              <i class = "fas fa-shopping-cart"></i>
            </a>

            <!-- 這裡放被加入購物車內的商品清單(讀取SESSION資訊) -->
            <div class = "dropdown-content dropdown-menu dropdown-menu-right dropdown-shoppingcart">

              <!-- 假設SESSION用 'product' 當購物車的key 可改 反正最後統一就好  -->

              <?php if( !isset($_SESSION['product']) || count($_SESSION['product']) ==0 ) { ?>            
                <li>購物車裡面空空的fdsaffdsafs</li>
              <?php 
              }

              else{   //for(i in $_SESSION['product']){   ?>


                      <!--  列出購物清單裡的東西 可以參考plist的寫法 但改成橫行顯示-->


              <?php  
                      //}?>

                <button style="width:inherit" onclick="location.href='../model/checkout.php'">前往結帳頁面</button>

              <?php
              }
              ?>

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
                <button class = "dropdown-button" style="width:inherit" onclick="location.href='../model/buy_list.php'"></button>

                <a href = "../view/reset_password.php">
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
