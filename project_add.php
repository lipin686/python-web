<html>
    <head>
        <meta charset="UTF-8" />
        <title>新增專案</title>

        <script src="jquery-3.4.1.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap-responsive.min.css">
    </head>
    <script>
        $(function () {
            $(".face_add").click(function () {
                if ($(".face_div").children().length == 10) {
                    alert("超過上限");
                } else {
                    $.ajax({
                        url: 'aaa.html',
                        type: 'get',
                        success: function (data){
                            $(".face_div").append(data);
                        }
                    })
                }
            })
        })
        
    </script>
    <body>
        <p>
            <h1>
                <center><b>新增專案</b></center>
            </h1>
        </p>
        <form action="db_project_add.php" method="post" name="form1">
            <center>
            <h1>
                <p><input type = "button" value = "回到專案管理" onclick="location.href='project.php'"></p>
                <p>專案名稱:<input type = "text" name = "name"></p><br>
                <p>專案說明:<input type = "text" name = "description"></p><br>
                <p><input type="button" class="face_add" value="新增面向"></p>
                <div class="face_div"></div>
                <input type = "submit" value="新增資料"><input type = "reset" value="重新輸入">
            </h1>
            </center>
        </form>
        <?php
        ?>
    </body>
</html>