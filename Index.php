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
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div>
            <div>
                <img src="uploadfiles/<?php echo $row['filename'] . '.' . $row['subname'] ?>" alt=""></img>
                <div>
                <?php echo $row['mname'] ?>
                </div>
                <div>
                    Price:<?php echo $row["mprice"]; ?>
                </div>
                <div>
                    Stock:<?php echo $row["stock"]; ?>
                </div>

            </div>
        </div>
    <?php
    }
    ?>





</body>

</html>