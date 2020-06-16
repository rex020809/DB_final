<html>
    <head>
        <?php require('../src/head.php') ?>
    </head>

    <body>
        <h3> 商品管理頁面 </h3>

        <button onclick = open_upload()> 商品上傳 </button>
        <button onclick = open_edit()> 商品編輯 </button>

        <hr>

        <div id = "upload" style = "display:none">

            <?php require('../model/product_upload.php'); ?>

        </div>

        <div id = "list" style =  "display:none">

            <?php require('../model/product_list.php'); ?>

        </div>

    </body>
</html>


<script type = "text/javascript">

    function open_upload()
    {
        document.getElementById("upload").style.display = "" ;
        document.getElementById("list").style.display = "none" ;
    }

    function open_edit()
    {
        document.getElementById("upload").style.display = "none" ;
        document.getElementById("list").style.display = "" ;
    }

</script>