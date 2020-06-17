<!-- 修改已有的商品資訊(含重新上傳圖片....等等) -->
<?php

    // 確認現在是選到哪個商品
    $p_id = $_GET['p_id'];

    // 取得該商品的資料
    require("../model/db_check.php");
    $conn = db_check();

    $sql    = "SELECT * FROM product WHERE p_id = '$p_id'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);

    $p_name = $row['p_name'];
    $p_info = $row['p_info'];
    $category = $row['category'];
    $tag = $row['tag'];
    $price = $row['price'];
    $stock = $row['stock'];
    $style = $row['style'];
    

?>

<div>

    <form action = "../model/update.php" method = "post" enctype="multipart/form-data">

        <div>
            <h3> 基本資訊 </h3>

            <p> 商品編號 : <?php echo $p_id; ?> </p> <br>
            <input type = "hidden" name = "p_id" value = "<?php echo $p_id; ?>" >
            <label for="p_name"> 商品名稱 </label> <input type = "text" name = "p_name" value = <?php echo $p_name; ?>> <br>
            <label for="p_info"> 商品描述 </label> <input type = "text" name = "p_info" value = <?php echo $p_info; ?>> <br>

            <!-- 這邊之後改成下拉式選單 -->
            <label for="category"> 商品分類  </label> <input type = "text" name = "category" value = <?php echo $category; ?>> <br>
            <label for="tag">      商品標籤  </label> <input type = "text" name = "tag" value = <?php echo $tag; ?>> <br>

        </div>

        <div>
            <h3> 銷售資訊 </h3>

            <label for="price"> 價格     </label> <input type = "number" name = "price" value = <?php echo $price; ?>> <br>
            <label for="stock"> 商品數量 </label> <input type = "number" name = "stock" value = <?php echo $stock; ?>> <br>
            <label for="style"> 商品款式 </label> <input type = "text" name = "style" value = <?php echo $style; ?>> <br>
            <!-- <label for="file" > 檔案名稱 </label> <input type = "file" name = "uploadFile[]" id = "" accept="image/jpeg,image/jpg,image/gif,image/png" multiple = "multiple" /> <br> -->
            
        </div>
        
        <button type="submit" class="btn-block btn-primary" name="submit">修改</button>

    </form>

</div>
