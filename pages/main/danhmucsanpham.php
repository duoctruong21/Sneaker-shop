<?php
    $sql_sp = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc = '$_GET[id]' AND soluong >0 ORDER BY tbl_sanpham.id_danhmuc DESC";
    $sql_query_prd = mysqli_query($mysqli,$sql_sp);
    $sql_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc= '$_GET[id]' LIMIT 1";
    $sql_query_prds = mysqli_query($mysqli,$sql_danhmucsp);
    $row_titles = mysqli_fetch_array($sql_query_prds);

?>
<h3><?php echo $row_titles['tendanhmuc'] ?></h3>
<ul class="product__list">
    <?php
        while($row_sp = mysqli_fetch_array($sql_query_prd)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_sp['id_sanpham'] ?>" class="product__item">
            <img src="admin/modules/quanlysanpham/uploads/<?php echo $row_sp['hinhanh'] ?>" alt="">
            <p class="product__item--name"><?php echo $row_sp['tensanpham'] ?></p>
            <p class="product__item--price"><?php echo number_format($row_sp['gia'],0,',','.').'VNĐ' ?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
