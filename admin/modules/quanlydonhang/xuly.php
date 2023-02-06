<?php
    require('../../../carbon/autoload.php');
    include("../../config/config.php");
	use Carbon\Carbon;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    if(isset($_GET['trangthai']) && isset($_GET['code'])){
        $trangthai = $_GET['trangthai'];
        $code = $_GET['code'];
        $sql = mysqli_query($mysqli, "UPDATE tbl_giohang SET trangthai='".$trangthai."' WHERE code_giohang='".$code."'");
        //thong ke doanh thu
        $sql_lietke_dh = "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_donhang.code_donhang='$code' ORDER BY tbl_donhang.id_donhang DESC";
        $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat='$now'"; 
        $query_thongke = mysqli_query($mysqli,$sql_thongke);

        $soluongmua = 0;
        $doanhthu = 0;
        while($row = mysqli_fetch_array($query_lietke_dh)){
              $soluongmua+=$row['soluongmua'];
              $doanhthu=$row['gia']*$soluongmua;
        }

        if(mysqli_num_rows($query_thongke)==0){
                $soluongban = $soluongmua;
                $doanhthu = $doanhthu;
                $donhang = 1;
                $sql_update_thongke = mysqli_query($mysqli,"INSERT INTO tbl_thongke (ngaydat,donhang,doanhthu,soluongban) VALUE('$now','$donhang','$doanhthu','$soluongban')" );
        }elseif(mysqli_num_rows($query_thongke)!=0){
            while($row_tk = mysqli_fetch_array($query_thongke)){
                $soluongban = $row_tk['soluongban'] + $soluongmua;
                $doanhthu = $row_tk['doanhthu'] + $doanhthu;
                $donhang = $row_tk['donhang']+1;
                $sql_update_thongke = mysqli_query($mysqli,"UPDATE tbl_thongke SET soluongban='$soluongban',doanhthu='$doanhthu',donhang='$donhang' WHERE ngaydat='$now'" );
            }
        }
        header('Location:../../index.php?action=quanlydonhang&query=lietke');

    }
?>