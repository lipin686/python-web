<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_add</title>
    </head>
    <body>
        <?php
            header("Refresh: 3; url=user.php");
            include('db_connect.php');
            $name=$_POST["name"];
            $account=$_POST["account"];
            $password=$_POST["password"];
            echo "新增成功 3秒後回到首頁";
            $res= sql_query("INSERT INTO `user`(`id`,`name`,`account`,`password`,`type`) VALUES (NULL,'$name','$account','$password','2')");
        ?>
    </body>
</html>