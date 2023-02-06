<?php
    if(isset($_POST['dangky'])){
        $customer_name = $_POST['customer_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];
        $pass = md5($_POST['pass']);
        $sql = mysqli_query($mysqli,"INSERT INTO tbl_dangki(tenkhachhang,dienthoai,email,diachi,matkhau) value('".$customer_name."',
        '".$phone_number."','".$email."','".$address."','".$pass."')");
        if($sql){
            echo '<p style="color:green">Đăng ký thành công</p>';
            $_SESSION['dangky'] = $customer_name;
            $_SESSION['email'] = $email;
            $_SESSION['sdt'] = $sdt;
            $_SESSION['diachi'] = $diachi;
            $_SESSION['matkhau'] = $matkhau;

            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
            header("Location:index.php?quanly=giohang");
        }
    }
?>
<div class="login_" style="z-index: 5;">
    <div class="login_main">
<div class="main__register">
    <style>
        .main__register {
            display: flex;
            align-items: center;
            height: 97vh;
            justify-content: center;
            }

            .register {
                border: 1px solid #333;
                padding: 20px;
            }

            .register h2 {
                text-align: center;
            }

            .information input {
                font-size: 1rem;
                padding: 10px;
                min-width: 400px;
                width: 95%;
            }

            .information, .submit {
                margin-top: 10px;
            }

            .submit {
                text-align: center;
            }

            .submit input{
                padding: 10px;
                width: 180px;
                text-transform: uppercase;
                background-color: #000;
                color: #fff;
                border: none;
            }
            .submit a{
                color: #000;
                border: none;
                text-decoration: none;
            }
    </style>
<form action="" autocomplete="off" method="POST">
    <div class="register">
        <h2>Đăng Ký</h2>
        <div class="information">
            <input type="text" name="customer_name" placeholder="Họ và tên">
        </div>
        <div class="information">
            <input type="text" name="address" placeholder="Địa chỉ">
        </div>
        <div class="information">
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="information">
            <input type="number" name="phone_number" placeholder="Số điện thoại">
        </div>
        <div class="information">
            <input type="password" name="pass" placeholder="Mật khẩu">
        </div>
        <div class="submit">
            <input type="submit" name="dangky" value="Đăng ký">
            <p><a href="index.php?quanly=dangnhap">Bạn đã có tài khoản</a></p>
        </div>
    </div>
</form>
</div>
</div>
</div>