<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>使用者管理</title>
    </head>
    <body>
        <p>
            <h1>
                <center><b>使用者管理</b></center>
            </h1>
        </p>
        <center>
        <h1>
            <input type = "button" name="add" value="回到上一頁" onclick="location.href='parts.php'">
            <input type = "button" name="add" value="新增" onclick="location.href='add.php'">
            
            <br>
            <table border="1" align="center">
                <tr>
                    <td>名稱</td>
                    <td>帳號</td>
                    <td>編輯功能</td>   
                </tr>
                
                <?php
                    $res = sql_query("SELECT * FROM `user`");
                    foreach($res as $val) {
                        ?>
                        <tr>
                            <td><?= $val['name']  ?></td>
                            <td><?= $val['account']  ?></td>
                            <td>
                                <a href="update.php?id=<?=$val["id"]?>">修改
                                <a href="db_delete.php?id=<?=$val["id"]?>">刪除
                            </td>
                        </tr>
                    <?php 
                    }
                ?>
            </table>
        </h1>
        </center>
    </body>
</html>