<html>
    <head>
        <meta charset="UTF-8" />
        <title>新增使用者</title>
    </head>
    <body>
        <p>
            <h1>
                <center><b>新增使用者</b></center>
            </h1>
        </p>
        <form action="db_add.php" method="post" name="form1">
            <table border="1" align = "center">
                <center>
                    <p>
                    <input type = "button" value = "回到使用者管理" onclick="location.href='user.php'">
                    </p>
                    <p>
                        <tr>
                            <td align = "center">欄位</td>
                            <td align = "center">資料</td>
                        </tr>
                        <tr>
                            <td>使用者名稱</td>
                            <td><input type = "text" name = "name"></td>
                        </tr>
                        
                        <tr>
                            <td>使用者帳號</td>
                            <td><input type = "text" name = "account"></td>
                        </tr>
                        <tr>
                            <td>使用者密碼</td>
                            <td><input type = "text" name = "password"></td>
                        </tr>
                        <tr>
                            <td align = "center" colspan = "2"><input type = "submit" value="新增資料"><input type = "reset" value="重新輸入"></td>
                        </tr>
                    </p>
                    
                </center>
            </table>
        </form>
        <?php
        ?>
    </body>
</html>