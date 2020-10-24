<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_update</title>
    </head>
    <body>
        <?php
            header("Refresh: 3; url=user.php");
            include('db_connect.php');
            $name=$_POST["name"];
            $password=$_POST["password"];
            $id=$_POST["id"];
            echo "修改成功 3秒後回到使用者管理";
            $res= sql_query("UPDATE `user` SET `name` = '$name',`password`='$password' WHERE `id` = '$id'");

        ?>
    </body>
</html>