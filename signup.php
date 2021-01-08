<?php include_once "database.php";
$sql = "SELECT * FROM `menu`";
$result = mysqli_query($con, $sql) or die('MySQL query error');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin-left: 30%;">
    <h1>中山玩具店</h1>
    <span>
        <a href="Index.php">查看商品</a>
        <a href="booking.php">訂購商品</a>
        <a href="management.php">管理商品</a>
        <a href="signup.php">使用者註冊</a>
    </span>
    <br>
    <div>
        <form role="form" action="config.php?method=signup" method="post" enctype="multipart/form-data">
            <div>
                <label for="username">帳號:</label>
                <input type="text" id="uid" name="uid" autocomplete="yes">
                (三個字元以下)
            </div>
            <div>
                <label for="password">密碼:</label>
                <input type="password" id="upwd" name="upwd" autocomplete="yes">
                (密碼六位以下)
            </div>
            <div>
                <input hidden type="submit" id="ulevel" name="ulevel" autocomplete="yes">
            </div>
            <br>
            <button type="submit">註冊帳號</button>
        </form>
    </div>





</body>

</html>