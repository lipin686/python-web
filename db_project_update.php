<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_project_update</title>
    </head>
    <body>
        <?php
            header("location:project.php");
            include('db_connect.php');
            $name=$_POST["name"];
            $description=$_POST["description"];
            $id=$_POST["id"];
            $direction_name = $_POST['direction_name'];
            $direction_description = $_POST['direction_description'];
            $direction_id = $_POST['direction_id'];
            
            $res= sql_query("DELETE FROM `direction` WHERE `direction_id`='$id'");
            $res= sql_query("UPDATE `project` SET `name` = '$name',`description`='$description' WHERE `id` = '$id'");
            foreach($direction_id as $k =>$aaaa){
                $res= sql_query("INSERT INTO `direction` (`id`,`direction_id`, `name`, `description`) VALUES (NULL,'$id' , '{$direction_name[$k]}', '{$direction_description[$k]}')");
            }
            
        ?>
    </body>
</html>