<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header("Location:login.php");
    }
?>


<div class="menu">
    <ul class="menu__list">
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
        <li><a href="index.php?action=thongke&query=thongke">Thống Kê</a></li>
        <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>  
        <li><a href="index.php?dangxuat=1"><?php if(isset($_SESSION['dangnhap'])){
            echo $_SESSION['dangnhap'];
        } ?></a></li>      
    </ul>
</div>