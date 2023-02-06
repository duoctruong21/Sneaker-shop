<div class="container">
    <?php 
        include("sidebar/sidebar.php");
    ?>
    <div class="maincontent">
        <?php
            if(isset($_GET['quanly'])){
                $tam =$_GET['quanly'];
            }else{
                $tam=''; 
            }
            if($tam == 'danhmucsanpham'){
                include("main/danhmucsanpham.php");
            }else if($tam == 'giohang'){
                include("main/giohang.php");
            }else if($tam == 'lienhe'){
                include("main/lienhe.php");
            }else if($tam == 'sanpham'){
                include("main/sanpham.php");
            }else if($tam == 'dangky'){
                include("main/dangky.php");
            }else if($tam == 'thanhtoan'){
                include("main/thanhtoan.php");
            }else if($tam == 'dangnhap'){
                include("main/dangnhap.php");
            }else if($tam == 'timkiem'){
                include("main/timkiem.php");
            }else if($tam == 'camon'){
                include("main/camon.php");
            }else if($tam == 'thaydoimk'){
                include("main/thaydoimk.php");
            }else if($tam == 'phanhoi'){
                include("main/phanhoi.php");
            }else{
                include("main/index.php");
            }
        ?>
    </div>
</div>