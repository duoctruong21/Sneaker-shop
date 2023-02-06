<?php
    include("../../config/config.php");
    $tenloaisanpham = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisanpham."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }elseif($_POST['suadanhmuc']){
        $sql_sua = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisanpham."',thutu='".$thutu."' WHERE id_danhmuc ='$_GET[id_danhmuc]'";
        mysqli_query($mysqli,$sql_sua);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{
        $id = $_GET['id_danhmuc'];
        $sql_delete = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
        mysqli_query($mysqli,$sql_delete);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>