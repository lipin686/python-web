<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_project_add</title>
    </head>
    <body>
        <?php
            $name=$_POST["name"];
            $description=$_POST["description"];
            $id = $_POST["id"];

            $res=sql_query("INSERT INTO `opinion`(`id`,`name`,`description`,`user_id`,`direction_id`) VALUE(NULL,'$name','$description','{$_SESSION["id"]}','$id')");
            header("location:opinion.php");
        ?>
    </body>
</html>