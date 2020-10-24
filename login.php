<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>管理頁面</title>
    </head>
    <body>
        <p>
            <h1>
                <center><b>專案討論系統</b></center>
            </h1>
        </p>
        <?php
            $account = $_POST["account"];
            $password= $_POST["password"];

            $res = sql_query("SELECT * FROM `user` where `account` = '$account' and `password` = '$password'")[0]; 
            if($res == ''){  
                $_SESSION['message'] = "登入失敗";
                header("location:index.php");
                exit;
            }
            $_SESSION['id'] = $res['id'];
            header("location:parts.php");
            exit;
        ?>
        <?php
        ?>
    </body>
</html>