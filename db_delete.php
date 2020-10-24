<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_delete</title>
    </head>
    <body>
        <?php
            header("Refresh: 3; url=user.php");
            include('db_connect.php');
            echo "刪除成功 3秒後回到首頁";
            $a = $_GET["id"];
            $res =sql_query("DELETE FROM `user` WHERE `id` =$a");
        ?>
    </body>
</html>