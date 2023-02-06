<div class="qldonhang">
<?php
    $sql_lietke_giohang = "SELECT * FROM tbl_donhang,tbl_sanpham WHERE tbl_donhang.id_sanpham = tbl_sanpham.id_sanpham 
    and tbl_donhang.code_donhang = '$_GET[code]' ORDER BY tbl_donhang.id_donhang DESC";
    $show_giohang = mysqli_query($mysqli,$sql_lietke_giohang);
?>

<table style="width:100%">
    <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Đơn Giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
        $i =0;
        $tongtien =0;
        while($row = mysqli_fetch_array($show_giohang)){
            $i++;
            $thanhtien = $row['gia']*$row['soluongmua'];
            $tongtien += $thanhtien;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_donhang'] ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px" alt=""></td>
        <td><?php echo $row['soluongmua'] ?></td>
        <td><?php echo number_format($row['gia'],0,',','.').'VNĐ' ?></td>      
        <td><?php echo number_format($row['gia']*$row['soluongmua'],0,',','.').'VNĐ' ?></td>     
    </tr>
    <?php
        }
    ?>
    <tr>
        <td colspan="6">
            <p>Tổng tiền
            <?php echo number_format($tongtien,0,',','.').'VNĐ' ?>
            </p>
        </td> 
    </tr>
    <a href="index.php?action=quanlydonhang&query=lietke">quay lại</a>
</table>
</div>