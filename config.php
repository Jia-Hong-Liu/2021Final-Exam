<?php
include_once "database.php";

switch ($_GET["method"]) {
    case "add":
        add();
        break;
    case "update":
        update();
        break;
    case "del":
        del();
        break;
    case "signup":
        signup();
        break;
    case "login":
        login();
        break;
    case "booking":
        booking();
        break;
    default:
        break;
}

function add()
{
    $mid = $_POST["mid"];
    $mname = $_POST["mname"];
    $mprice = $_POST["mprice"];
    $pic = $_FILES["pic"]["name"];
    if ($mid == null ||  $mname == null || $mprice == null || $pic == null) {
        echo "<script type='text/javascript'>";
        echo "alert('不能為空');";
        echo "location.href='management.php';";
        echo "</script>";
    } else {
        $file = explode(".", $pic);
        $filename = $file[0];
        $subname = $file[1];
        $tmp_name = $_FILES["pic"]["tmp_name"];
        move_uploaded_file($tmp_name, "uploadfiles/" . $pic);
        $sql = "INSERT INTO `menu` (mid, mname, mprice, filename, subname )
				VALUES ('$mid', '$mname', '$mprice', '$filename', '$subname')";
        global $con;
        $result = mysqli_query($con, $sql) or die('MySQL query error');
        echo "<script type='text/javascript'>";
        echo "alert('新增商品成功');";
        echo "location.href='management.php';";
        echo "</script>";
    }
}

function update()
{
    $mid = $_POST["mid"];
    $mprice = $_POST["mprice"];
    $stock = $_POST["stock"];
    $sql = "UPDATE `menu` SET mid = '$mid', mprice = '$mprice', stock = '$stock' WHERE mid = '$mid'";
    global $con;
    $result = mysqli_query($con, $sql) or die('MySQL query error');
    echo "<script type='text/javascript'>";
    echo "alert('編輯成功');";
    echo "location.href='del.php';";
    echo "</script>";
   
}

function del()
{
    $mid = $_GET["mid"];
    $sql = "DELETE FROM `menu` WHERE mid = $mid";
    global $con;
    $result = mysqli_query($con, $sql) or die('MySQL query error');
    echo "<script type='text/javascript'>";
    echo "alert('刪除成功');";
    echo "location.href='booking.php';";
    echo "</script>";
}

function signup(){
    $uid = $_POST["uid"];
    $upwd = $_POST["upwd"];
    $sql="SELECT * FROM `users`
            WHERE `uid` = '$_POST[uid]'";
    global $con;
    $result = mysqli_query($con , $sql) or die('MySQL query error');
    $row = mysqli_fetch_array($result);
    if($row!=""){
        echo "<script type='text/javascript'>";
        echo "alert('已經辦過帳號囉');";
        echo "location.href='login.php';";
        echo "</script>";
    }
    else{
        $ulevel = 'B';
        if(strlen($upwd) > 6){
            echo "<script type='text/javascript'>";
            echo "alert('密碼六位以下!');";
            echo "location.href='signup.php';";
            echo "</script>";
        }
        if(strlen($uid) > 3){
            echo "<script type='text/javascript'>";
            echo "alert('帳號太長!');";
            echo "location.href='signup.php';";
            echo "</script>";
        }
        else{
            if($uid == null || $upwd == null){
                echo "<script type='text/javascript'>";
                echo "alert('不能為空');";
                echo "location.href='signup.php';";
                echo "</script>";
            }else{
                    $sql="INSERT INTO `users` (uid, upwd, ulevel)
                    VALUES ('$_POST[uid]','$_POST[upwd]', '$ulevel')";
                    global $con;
                    $result = mysqli_query($con , $sql) or die("MySQL query error");
                    
                    $sql="SELECT * FROM `users`
                        WHERE `ulevel` = '$_POST[ulevel]'";
                    global $con;
                    $result = mysqli_query($con , $sql) or die('MySQL query error');
                    $row = mysqli_fetch_array($result);		    
                    session_start();
                    $_SESSION["ulevel"] = $row["ulevel"];
                    echo "<script type='text/javascript'>";
                    echo "alert('註冊成功');";
                    echo "location.href='index.php';";
                    echo "</script>";
                }	
        }			
    }
} 
function login(){
    $sql="SELECT * FROM `users`
            WHERE uid = '$_POST[uid]' && upwd = '$_POST[upwd]'";
    global $con;
    $result = mysqli_query($con , $sql) or die('MySQL query error');
    $row = mysqli_fetch_array($result);
    if($row==""){
        echo "<script type='text/javascript'>";
        echo "alert('帳密錯誤');";
        echo "location.href='login.php';";
        echo "</script>";
    }else{
        session_start();
        $_SESSION["ulevel"] = $row["ulevel"];
        echo "<script type='text/javascript'>";
        echo "alert('登入成功');";
        echo "location.href='booking.php';";
        echo "</script>";
    }
} 
function booking(){
    echo "<script type='text/javascript'>";
    echo "alert('訂購成功');";
    echo "location.href='booking.php';";
    echo "</script>";
} 