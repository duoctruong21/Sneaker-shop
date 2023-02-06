<?php
    include("../../config/config.php");

    $tensanpham = $_POST['tensanpham'];
    $masanpham = $_POST['masp'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['gia'];
    $noidung = $_POST['noidung'];
    $tomtat = $_POST['tomtat'];
    $trangthai = $_POST['trangthai'];
    $danhmuc = $_POST['danhmuc'];
    //xữ lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;

    if(isset($_POST['themsanpham'])){
        $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masanpham,soluong,gia,hinhanh,tomtat,noidung,trangthai,id_danhmuc) VALUE('".$tensanpham."
        ','".$masanpham."','".$soluong."','".$gia."','".$hinhanh."','".$tomtat."','".$noidung."','".$trangthai."','".$danhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }elseif($_POST['suasanpham']){
        if($hinhanh !=''){
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
            $sql_sua = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."',soluong='".$soluong."'
            ,gia='".$gia."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."'
            ,trangthai='".$trangthai."',id_danhmuc='".$danhmuc."' WHERE id_sanpham ='$_GET[id_sanpham]'";
            $id = $_GET['id_sanpham'];
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1"; 
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_sua = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masanpham='".$masanpham."',soluong='".$soluong."'
            ,gia='".$gia."',tomtat='".$tomtat."',noidung='".$noidung."'
            ,trangthai='".$trangthai."' WHERE id_sanpham ='$_GET[id_sanpham]'";
        }
        mysqli_query($mysqli,$sql_sua);
        header('Location:../../index.php?action=quanlysanpham&query=them');
        
    }else{
        $id = $_GET['id_sanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1"; 
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_delete = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
        mysqli_query($mysqli,$sql_delete);
        header('Location:../../index.php?action=quanlysanpham&query=them');
    }
?>