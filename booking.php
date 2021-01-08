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
        $row1 = mysqli_fetch_row($result);
        $row2 = mysqli_fetch_row($result);
        $row3 = mysqli_fetch_row($result);
        $row4 = mysqli_fetch_row($result);
        $row5 = mysqli_fetch_row($result);
        $row6 = mysqli_fetch_row($result);
    ?>
        <div>
            <form role="form" action="bookingdef.php" method="post" enctype="multipart/form-data">

                <div> <?php echo "<img src='uploadfiles/$row1[4].$row1[5]' style='width: 100px; height:100px'>$row1[1]</img>" .
                            '&nbsp&nbsp價格:' . $row1[2] . '&nbsp&nbsp&nbsp數量:' . $row1[3]; ?>&nbsp&nbsp&nbsp
                    購買數量:<input type="number" step="1" min="0" name="num1">
                </div>
                <div> <?php echo "<img src='uploadfiles/$row2[4].$row2[5]' style='width: 100px; height:100px'>$row2[1]</img>" .
                            '&nbsp&nbsp價格:' . $row2[2] . '&nbsp&nbsp&nbsp數量:' . $row2[3]; ?>&nbsp&nbsp&nbsp
                    購買數量:<input type="number" step="1" min="0" name="num2">
                </div>
                <div>
                    <?php echo "<img src='uploadfiles/$row3[4].$row3[5]' style='width: 100px; height:100px'>$row3[1]</img>" .
                        '&nbsp&nbsp價格:' . $row3[2] . '&nbsp&nbsp&nbsp數量:' . $row3[3]; ?>&nbsp&nbsp&nbsp
                    購買數量:<input type="number" step="1" min="0" name="num3">
                </div>
                <div>


                    <?php echo "<img src='uploadfiles/$row4[4].$row1[5]' style='width: 100px; height:100px'>$row4[1]</img>" .
                        '&nbsp&nbsp價格:' . $row4[2] . '&nbsp&nbsp&nbsp數量:' . $row4[3]; ?>&nbsp&nbsp&nbsp
                    購買數量:<input type="number" step="1" min="0" name="num4">
                </div>

                <br>
                <button type="submit"><a href="bookingdef.php">確認購買</a></button>
            </form>
        </div>
    <?php
    }
    ?>

    <!-- <img src="uploadfiles/<?php echo $row[5]['filename'] . '.' . $row[6]['subname'] ?>" style="width: 100px; height:100px"></img>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    名稱:<?php echo $row['mname'] ?>
                    價錢:<?php echo $row["mprice"]; ?>
                    數量:<?php echo $row["stock"]; ?>
                    <form role="form" action="config.php?method=update" method="post" enctype="multipart/form-data">
                        <input hidden type="text" name="mid" value="<?php $row['mid'] ?>">
                        <input type="number" step="1" min="0" name="num">
                        <button type="submit">確認購買</button>
                    </form>
                </span> -->



</body>

</html>