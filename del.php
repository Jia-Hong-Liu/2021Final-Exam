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
            <a href="management.php">新增商品</a>
            <a href="del.php">商品異動</a>
        </div>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        if (@$_SESSION["ulevel"] == ('A' || 'B')) {
    ?>
            <div>
                <span>
                    <img src="uploadfiles/<?php echo $row['filename'] . '.' . $row['subname'] ?>" style="width: 100px; height:100px"></img>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <form role="form" action="config.php?method=update" method="post" enctype="multipart/form-data">
                        <input hidden type="text" name="mid" value="<?php $row['mid']?>">
                        <input type="text" name="mname" value="<?php echo $row['mname'] ?>">
                        <input type="number" step="1" min="0" name="mprice" value="<?php echo $row["mprice"]; ?>">
                        <input type="number" step="1" min="0" name="stock" value="<?php echo $row["stock"]; ?>">
                        <button type="submit">編輯</button>
                        <a href="config.php?method=del&mid=<?php echo $row["mid"] ?>">刪除</a>
                    </form>

                </span>
            </div>
        <?php
        }
        ?>
    <?php }
    ?>





</body>

</html>