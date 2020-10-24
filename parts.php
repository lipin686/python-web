<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>分類</title>
        
    </head>
    <body >
        <p>
            <h1>
                <center><b>分類</b></center>
            </h1>
        </p>
        <center>
        <h3>
           <a href="user.php">使用者管理</a>discuss
           <a href="project.php">專案管理</a>
           <a href="leader.php">組長功能管理</a>
           <a href="stat.php">統計管理</a>
            
        </h3>
        <?php
            $res = sql_query("SELECT * FROM `project`, `member` where member.project_id = project.id and member.user_id = '{$_SESSION['id']}'");
            
            foreach ($res as $result) {
                
                ?>
                <div onClick="location.href='discuss.php?id=<?=$result['project_id']?>'">
                    <?=$result['name']?>
                </div>
                <?php
            }
        ?>
        </center>
        
    </body>
</html>