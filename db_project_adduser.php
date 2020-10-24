<html>
    <head>
        <meta charset="UTF-8" />
        <title>db_project_adduser</title>
    </head>
    <body>
        <?php
            
            include('db_connect.php');
            $leader=$_POST["leader"];
            $member=$_POST["member"];
            $id= $_POST["id"];

            $res= sql_query("DELETE FROM `member` WHERE project_id = $id ");
            $res= sql_query("INSERT INTO `member`(`id`,`project_id`,`user_id`,`type`) VALUES (NULL,'$id','1','1')");
            $res= sql_query("INSERT INTO `member`(`id`,`project_id`,`user_id`,`type`) VALUES (NULL,'$id','$leader','1')");

            foreach($member as $value){
                $res= sql_query("INSERT INTO `member`(`id`,`project_id`,`user_id`,`type`) VALUES (NULL,'$id','$value','2')");
            }
            
            //header("Refresh: 3; url=project.php");
            header("location:project.php");
        ?>
    </body>
</html>