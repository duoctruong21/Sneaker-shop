<div class="qldonhang">

<?php
    $sql_lietke_giohang = "SELECT * FROM tbl_giohang,tbl_dangki WHERE tbl_giohang.id_khachhang = tbl_dangki.id_dangky ORDER BY id_giohang DESC";
    $show_giohang = mysqli_query($mysqli,$sql_lietke_giohang);
?>

<p>Liệt kê đơn hàng</p>
<table style="width:100%">
    <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt</th>
        <th>Email</th>
        <th>Tình trạng</th>
    </tr>
    <?php
        $i =0;
        while($row = mysqli_fetch_array($show_giohang)){
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['code_giohang'] ?></td>
        <td><?php echo $row['tenkhachhang'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['dienthoai'] ?></td>   
        <td><?php echo $row['giohang_date'] ?></td>     
        <td><?php echo $row['email'] ?></td> 
        <td>
            <?php
                if($row['trangthai']==1){
                    echo '<a href="modules/quanlydonhang/xuly.php?trangthai=0&code='.$row['code_giohang'].'">Đơn hàng mới</a>';
                }else{
                    echo 'Đã xử lý';
                }
            ?>
        </td>   
        <td>
            <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_giohang'] ?>">Xem đơn hàng</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
</div>