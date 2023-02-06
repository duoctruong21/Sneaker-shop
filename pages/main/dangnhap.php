<?php
    if(isset($_POST['dangnhap'])){
        $email =$_POST['email'];
        $matkhau =md5($_POST['pass']);
        $sql = "SELECT * FROM tbl_dangki WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['sdt'] = $row_data['dienthoai'];
            $_SESSION['diachi'] = $row_data['diachi'];
            $_SESSION['matkhau'] = $row_data['matkhau'];
            $_SESSION['id_khachhang'] =$row_data['id_dangky'];
            header("Location:index.php?quanly=giohang");
        }else{
            echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
        }
    }
?>
<div class="login_" style="z-index: 5;">
    <div class="login_main">
    <div class="main__login">
    <style>
        .main__login {
    display: flex;
    align-items: center;
    height: 97vh;
    justify-content: center;
}

.login {
    border: 1px solid #333;
    padding: 20px;
}

.login h2 {
    text-align: center;
}

.username input, .password input {
    font-size: 1rem;
    padding: 10px;
    min-width: 400px;
    width: 95%;
}

.password, .submit {
    margin-top: 10px;
}

.submit {
    text-align: center;
    width: 100%;
}

.submit input{
    padding: 10px;
    width: 180px;
    text-transform: uppercase;
    background-color: #000;
    color: #fff;
    border: none;
}
.flex_login {
    display: flex;
    justify-content: space-between;
}
.flex_login a {
    margin-top: 5px;
    text-decoration: none;
    color: #000;
}
    </style>
    <form action="" autocomplete="off" method="POST">
        <div class="login">
            <h2>Đăng nhập</h2>
            <div class="username">
                <input type="email" name="email" placeholder="Tài khoản">
            </div>
            <div class="password">
                <input type="password" name="pass" placeholder="Mật khẩu">
            </div>
            <div class="submit">
                <input type="submit" name="dangnhap" value="Đăng nhập">
            </div>
            <div class="flex_login">
                <a href="index.php">Quay về trang chủ</a>
                <a href="index.php?quanly=dangky">Đăng ký tài khoản</a>
            </div>
        </div>
    </form>
</div>            
    </div>
</div>
