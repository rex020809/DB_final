
<body>

    <form action = "../model/upload.php" method = "post" enctype="multipart/form-data">

        <div>
            <h3> 基本資訊 </h3>

            <label for="p_name"> 商品名稱 </label> <input type = "text" name = "p_name" > <br>
            <label for="p_info"> 商品描述 </label> <input type = "text" name = "p_info" > <br>

            <!-- 這邊之後改成下拉式選單 -->
            <label for="category"> 商品分類  </label> <input type = "text" name = "category" > <br>
            <label for="tag">      商品標籤  </label> <input type = "text" name = "tag" > <br>

        </div>

        <div>
            <h3> 銷售資訊 </h3>
            
            <label for="price"> 價格     </label> <input type = "number" name = "price"> <br>
            <label for="stock"> 商品數量 </label> <input type = "number" name = "stock"> <br>
            <label for="style"> 商品款式 </label> <input type = "text" name = "style"> <br>
            <label for="file" > 檔案名稱 </label> <input type = "file" name = "uploadFile[]" id = "" accept="image/jpeg,image/jpg,image/gif,image/png" multiple = "multiple" /> <br>
            
        </div>
        
        <button type="submit" class="btn-block btn-primary" name="submit">上傳</button>

    </form>

</body>


