<?php
    if(isset($_POST['thaydoimk'])){
        $ten = $_POST['customer_name'];
        $diachi = $_POST['address'];
        $sdt = $_POST['phone_number'];
        $taikhoan =$_POST['email'];
        $matkhau =md5($_POST['pass']);
        $matkhaumoi =md5($_POST['pass_new']);
        $sql = "SELECT * FROM tbl_dangki WHERE email='".$taikhoan."' AND matkhau='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        $row_data = mysqli_fetch_array($row);
        if($count>0){
            $sql_update = mysqli_query($mysqli,"UPDATE tbl_dangki SET tenkhachhang ='".$ten."',dienthoai ='".$sdt."'
            ,diachi ='".$diachi."',matkhau ='".$matkhaumoi."' WHERE email='".$taikhoan."' AND matkhau='".$matkhau."'");
            $_SESSION['dangky'] = $ten;
            $_SESSION['sdt'] = $sdt;
            $_SESSION['diachi'] = $diachi;
            $_SESSION['matkhau'] = $matkhau;
            echo '<script>alert("Cập nhật thành công");</script>';   
            header("Location:index.php?quanly=giohang");       
        }else{
            echo '<script>alert("Mật khẩu không chính xác, vui lòng nhập lại");</script>';
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
        <h2>Cập nhập</h2>
        <div class="information">
            <input type="text" name="email" value="<?php echo $_SESSION['email'] ?>" readonly>
        </div>
        <div class="information">
            <input type="text" name="customer_name" value="<?php echo $_SESSION['dangky'] ?>" placeholder="Họ và tên">
        </div>
        <div class="information">
            <input type="text" name="address" value="<?php echo $_SESSION['diachi'] ?>" placeholder="Địa chỉ">
        </div>
        <div class="information">
            <input type="number" name="phone_number" value="<?php echo $_SESSION['sdt'] ?>" placeholder="Số điện thoại">
        </div>
        <div class="information">
            <input type="password" name="pass" placeholder="Mật khẩu cũ">
        </div>
        <div class="information">
            <input type="password" name="pass_new" placeholder="Mật khẩu mới">
        </div>
        <div class="submit">
            <input type="submit" name="thaydoimk" value="Cập nhập">
            <p><a href="index.php?quanly=giohang">Trở về</a></p>
        </div>
    </div>
</form>
</div>
</div>
</div>
