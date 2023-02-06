<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $sql_query = mysqli_query($mysqli,$sql_danhmuc);
?>
<div class="sidebar">
    <ul class="sidebar__list">
    <?php
            while($row_danhmuc = mysqli_fetch_array($sql_query)){
        ?>
        <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
        <?php
            }
        ?>
    </ul>
</div>