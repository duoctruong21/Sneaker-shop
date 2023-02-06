<?php
    $tukhoa='';
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_sp = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$tukhoa."%'";
    $sql_query = mysqli_query($mysqli,$sql_sp);
?>
<h3>Từ kháo tìm kiếm: <?php echo $_POST['tukhoa']; ?></h3>
<ul class="product__list">
    <?php
        while($row_sp = mysqli_fetch_array($sql_query)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_sp['id_sanpham'] ?>" class="product__item">
            <img src="admin/modules/quanlysanpham/uploads/<?php echo $row_sp['hinhanh'] ?>" width="100%" alt="">
            <p class="product__item--name"><?php echo $row_sp['tensanpham'] ?></p>
            <p class="product__item--price"><?php echo number_format($row_sp['gia'],0,',','.').'VNĐ' ?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
