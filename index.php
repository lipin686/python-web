<?php
	include("db_connect.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>專案討論系統</title>
    </head>
    <body>
        <p>
            <h1>
                <center><b>專案討論系統</b></center>
            </h1>
        </p>
        <p>
        
            <center>
            <h1>
                <?php
                    if ($_SESSION['message'] != "") {
                        echo $_SESSION['message'];
                        $_SESSION['message'] = "";
                    }
                ?>
                <form action="login.php" method="post" name="form1">
                    帳號:<input type="text" name="account" required><br>
                    密碼:<input type="password" name="password" required><br>
                    <input type = "reset" value = "清除"><input type = "submit" value = "登入">
                </form>
            </h1>
            </center>
        </p>
        <?php
        ?>
    </body>
</html>