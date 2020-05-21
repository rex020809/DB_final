<link rel="stylesheet" type = "text/css" href="../src/css/nav.css">

<!-- 搜尋欄navbar (會黏在最上層) -->
<div class = "topnav">
  <!--有些地方還要修 有可能會把<div container>標籤拿掉 所以在其他css裡面盡量先不要引用container  by學弟-->
    <nav class = "navbar bg-navbar ">
      <div class = "container-fluid">

          <div class = "col-xl-1">
            <a class = "navbar-brand" href="../index.php"> 
              <!-- 這裡放Logo <img src=""> -->
            </a>
          </div>

          <div class = "col-xl-6 col-xl-offset-2">
            <form action="searchpage.php" method="POST">
                <input type ="text" name = "search" placeholder = " 搜尋商品" style ="width:90%">
                <input type ="submit" value = "搜尋">
            </form>
          </div>

          <!-- 跟登入有關的東西寫在這塊底下 -->
          <div class = "dropdown">
            <a class = "float-right" href = "#">登入</a>
            <a class = "h float-right" href = "#">
              <i class = "fas fa-shopping-cart">
                <!-- 這裡放購物車的清單 (在nav底下hover好像不能用但先暫訂放這邊) -->
              </i>
            </a>
          </div>
          
      </div>
    </nav>
</div>

<!-- 類別navbar -->
<div class = "category-nav">
  <nav class = "navbar bg-category">
    <!-- 自行增加類別 -->
  </nav>
</div>
