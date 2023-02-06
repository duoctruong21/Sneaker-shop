<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $sql_query = mysqli_query($mysqli,$sql_danhmuc);
?>
<?php
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>
<div class="menu">
    <ul class="menu__list">
        <li>
            <img src="./img/logoshop.jpg" width="50px" alt="">
            <a href="index.php"><span>Sneaker shop</span></a>
        </li>
        <li>
            <a class="category" href="index.php?quanly=index.php">Danh mục sản phẩm </a>
            <ul class="category__list">
            <?php
                while($row_danhmuc = mysqli_fetch_array($sql_query)){
            ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
            <?php
                }
            ?>
        </ul>
        </li>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <?php
            if(isset($_SESSION['dangky'])){
        ?>
            
        <?php
            }else{
        ?>
        <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php } ?>
        <li>
            <p>
                <form action="index.php?quanly=timkiem" method="POST">
                    <div class="search">
                        <input type="text" placeholder="Tìm kiếm sản phẩm.." name="tukhoa">
                        <button name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </p>
        </li>
        <?php
            if(isset($_SESSION['dangky'])){
        ?>
            <li>
            <div class="user">
            <i class="fa-solid fa-user"></i>
            <ul class="user__list">
                <li><p><?php echo $_SESSION['dangky']; ?></p></li>
                <li><a href="index.php?quanly=thaydoimk">Quản lý</a></li>
                <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
            </ul>
            </div>
            </li>
        <?php
            }
            ?>
    </ul>
</div>