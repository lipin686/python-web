<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>意見</title>
    </head>
    <body >
        <center>
        <h3>
           <a href="user.php">使用者管理</a>
           <a href="project.php">專案管理</a>
           <a href="leader.php">組長功能管理</a>
           <a href="stat.php">統計管理</a>
        </h3>
        <?php 
            $id = $_GET["id"];
        ?>
        
        <form action="db_opinion_add.php" method ="post">
            標題:<input type="text" name="name" ><br>
            說明:<input type="text" name="description"><br>
            <input type ="hidden" name="id" value="<?=$id?>">
            <input type ="submit" value="送出">

        </form>

        </center>
        
    </body>
</html>