<?php
    session_start();
    include("../../admin/config/config.php");
    require('../../carbon/autoload.php');
	use Carbon\Carbon;
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,9999);
    $insert_cart = "INSERT INTO tbl_giohang(id_khachhang, code_giohang,trangthai,giohang_date) value('".$id_khachhang."','".$code_order."',1,'".$now."')";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        // them chi tiet gio hang
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_donhang(id_sanpham, code_donhang,soluongmua) value('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
            $sql_sp = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$id_sanpham."'";
            $sql_query_prd = mysqli_query($mysqli,$sql_sp);
            $row = mysqli_fetch_array($sql_query_prd);
            if($row['soluong']< $soluong){
                header('Location:../../index.php?quanly=phanhoi');
            }
            else{
                $update = "UPDATE tbl_sanpham SET soluong = soluong - '".$soluong."' WHERE id_sanpham = '".$id_sanpham."'";
                $update_sp = mysqli_query($mysqli,$update);
                unset($_SESSION['cart']);
                header('Location:../../index.php?quanly=camon');
            }
        }
    }
?>