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

            $direction_name = $_POST['direction_name'];
            $direction_description = $_POST['direction_description'];
            $direction_id = $_POST['direction_id'];

            $res= sql_query("INSERT INTO `project`(`id`,`name`,`description`) VALUES (NULL,'$name','$description')");
            $id = $mysql->lastInsertId();
            $res= sql_query("INSERT INTO `member`(`id`,`project_id`,`user_id`,`type`) VALUES (NULL,'$id','1','1')");
        
            foreach ($direction_id as $k=>$aaaa){
                $res= sql_query("INSERT INTO `direction` (`id`,`direction_id`, `name`, `description`) VALUES (NULL,'$id' , '{$direction_name[$k]}', '{$direction_description[$k]}')");
            }
            //header("Refresh: 3; url=project.php");
            header("location:project.php");
        ?>
    </body>
</html>