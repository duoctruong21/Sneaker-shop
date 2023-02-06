<?php
    session_start();
    include("config/config.php");
    if(isset($_POST['dangnhap'])){
        $taikhoan =$_POST['user'];
        $matkhau =md5($_POST['pass']);
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location:index.php");
        }else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Đăng nhập</title>
</head>
<body>
<div class="main">
    <form action="" autocomplete="off" method="POST">
        <div class="login">
            <h2>Đăng nhập</h2>
            <div class="username">
                <input type="text" name="user" placeholder="Tài khoản">
            </div>
            <div class="password">
                <input type="password" name="pass" placeholder="Mật khẩu">
            </div>
            <div class="submit">
                <input type="submit" name="dangnhap" value="Đăng nhập">
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>