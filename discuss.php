<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>討論</title>
        
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
            $id = $_GET['id'];
            $project = sql_query("SELECT * FROM `project` where `id` ='$id'");
            foreach ($project as $pro) {
                echo "專案名稱:" , $pro['name'];
            }
            $res = sql_query("SELECT * FROM `direction` where `direction_id` ='$id'");
        
            ?>

            <table border="1">
                <tr>
                    <td>面向名稱</td>
                    <td>面向說明</td>
                    <td>功能</td>
                </tr>
            <?php
            foreach ($res as $result) {
                
                ?>
                <div>
                   
                    <tr>
                        <td><?=$result['name']?></td>
                        <td><?=$result['description']?> </td>
                        <td><button onclick="location.href='opinion.php?id=<?= $result['id']?>'">討論</td>
                    </tr>
                       
                    
                </div>
                <?php
            }
        ?>
        </center>
        
    </body>
</html>