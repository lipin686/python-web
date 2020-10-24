<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_project_delete</title>
    </head>
    <body>
        <?php
            header("location:project.php");
            include('db_connect.php');
            echo "刪除成功 3秒後回到首頁";
            $id = $_GET["id"];
            $res =sql_query("DELETE FROM `project` WHERE `id` =$id");
            $res= sql_query("DELETE FROM `direction` WHERE `direction_id`='$id'");
        ?>
    </body>
</html>