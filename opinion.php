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
        <?php $id = $_GET["id"]?>
        <div><button onclick="location.href='opinion_add.php?id=<?= $id?>'">發表意見</div>
        <table border ="1">
            <tr>
                <td>編號</td>
                <td>標題</td>
                <td>說明</td>
                <td>發表日期</td>
                <td>發表者的名稱</td>
                <td>平均分數</td>
                <td>評價人數</td>
                <td>功能</td>
            </tr>
        <?php
        $res = sql_query("SELECT * FROM `opinion`");
        
        foreach ($res as $result){
            $aa= sql_query("SELECT * FROM `user` WHERE `id` = '{$result['user_id']}'")[0];
        ?>
            <tr>
                <td align ="center"><?=$result['id']?></td>
                <td align ="center"><?=$result['name']?></td>
                <td align ="center"><?=$result['description']?></td>
                <td align ="center"><?=$result['date']?></td>
                <td align ="center"><?=$aa['name']?></td>
                <td align ="center"><?=$result['scores']?></td>
                <td align ="center"><?=$result['people_count']?></td>
                
        <?php
        }
        ?>
        </table>
        </center>
        
    </body>
</html>