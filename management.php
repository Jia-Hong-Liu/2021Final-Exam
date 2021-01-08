<?php include_once "database.php";
session_start();
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
    <div>
        <br>
        <a href="login.php">登入會員</a>
    </div>
    <?php
    if (@$_SESSION["ulevel"] == ('A' || 'B')) {
    ?>
        <div>
            <br>
            <a href="management.php">新增商品</a>
            <a href="del.php">商品異動</a>
        </div>
        <div>
            <form role="form" action="config.php?method=add" method="post" enctype="multipart/form-data">
                <br>
                <div>
                    <label>商品編號:</label>
                    <input type="number" id="mid" name="mid">
                </div>
                <br>
                <div>
                    <label>商品名稱:</label>
                    <input type="text" id="mname" name="mname">
                </div>
                <br>
                <div>
                    <label>商品價格:</label>
                    <input type="number" id="mprice" name="mprice">
                </div>
                <br>
                <div>
                    <label>上傳圖片:</label>
                    <input type="file" id="pic" name="pic">
                </div>
                <br>
                <button type="submit" style="font-size:20px;">新增下一筆</button>
            </form>
        </div>
    <?php
    } ?>



</body>

</html>