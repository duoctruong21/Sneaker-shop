<?php
    $sql_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc
    AND tbl_sanpham.id_sanpham ='$_GET[id]' AND soluong > 0 ORDER BY tbl_sanpham.
    id_sanpham DESC LIMIT 15";
    $sql_query = mysqli_query($mysqli,$sql_sp);
    while($row_sp = mysqli_fetch_array($sql_query)){
?>
<form action="pages/main/themgiohang.php?id_sanpham=<?php echo $row_sp['id_sanpham'] ?>" method="POST">
    <div class="product">
        <div class="image_product">
            <img src="admin/modules/quanlysanpham/uploads/<?php echo $row_sp['hinhanh'] ?>" alt="">
        </div>
        <div class="product_item">
            <h3><?php echo $row_sp['tensanpham'] ?></h3>
            <p>Mã sản phẩm: <span class="msp"><?php echo $row_sp['masanpham'] ?></span></p>
            <p>Danh mục: <?php echo $row_sp['tendanhmuc'] ?></p>
            <p>Giá: <?php echo number_format($row_sp['gia'],0,',','.').'VNĐ' ?></p>
            <p><?php echo $row_sp['noidung'] ?></p>
            <p><input type="submit" name="themgiohang" value="Thêm giỏ hàng"></p>
        </div>
    </div>
</form>

<?php
    }
?>