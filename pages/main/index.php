<?php
    if(isset($_GET['trang'])){
        $pages = $_GET['trang'];
    }else{
        $pages=1;
    }
    if($pages == '' || $pages == 1){
        $begin=0;
    }else{
        $begin = ($pages*10)-10;
    }
    $sql_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.
    id_sanpham DESC LIMIT $begin,10";
    $sql_query = mysqli_query($mysqli,$sql_sp);

?>
<h3>Sản phẩm mới nhất</h3>
<ul class="product__list">
    <?php
        while($row_sp = mysqli_fetch_array($sql_query)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row_sp['id_sanpham'] ?>" class="product__item">
            <img src="admin/modules/quanlysanpham/uploads/<?php echo $row_sp['hinhanh'] ?>" width="100%" alt="">
            <p class="product__item--name"><?php echo $row_sp['tensanpham'] ?></p>
            <p class="product__item--price"><?php echo number_format($row_sp['gia'],0,',','.').'VNĐ' ?></p>
            <p class="product__item--product"><?php echo $row_sp['tendanhmuc']?></p>
        </a>
    </li>
    <?php
        }
    ?>
</ul>
<div style="clear: both;"></div>
<style>
    .page__list {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        justify-content: center;
    }
    .page__list li {
        float: left;
        margin: 5px;
        background-color: #33333387;
    }
    .page__list li a{
        display: block;
        padding: 5px 13px;
        color: #000;
        text-decoration: none;
        text-align: center;
    }
</style>
<?php
    $sql_page = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
    $row_count = mysqli_num_rows($sql_page);
    $page = ceil($row_count / 10);
?>
<ul class="page__list">
    <?php

        for($i=1; $i<=$page; $i++){?>
            <li><a <?php  if($i==$pages){echo 'style="background-color:#ccc"';} ?> href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
    ?>
</ul>
