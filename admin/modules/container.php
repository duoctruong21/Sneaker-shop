<div class="container">
<?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam =$_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam=''; 
            $query='';
        }
        if($tam == 'quanlydanhmucsanpham' && $query == 'them'){
            include("modules/quanlydanhmucsanpham/them.php");
            include("modules/quanlydanhmucsanpham/lietke.php");            
        }elseif($tam == 'quanlydanhmucsanpham' && $query == 'edit'){
                include("modules/quanlydanhmucsanpham/sua.php");           
        }elseif($tam == 'quanlysanpham' && $query == 'them'){
            include("modules/quanlysanpham/them.php");
            include("modules/quanlysanpham/lietke.php");          
        }elseif($tam == 'quanlysanpham' && $query == 'edit'){
            include("modules/quanlysanpham/sua.php");           
        }elseif($tam == 'quanlydonhang' && $query == 'lietke'){
            include("modules/quanlydonhang/lietke.php");           
        }elseif($tam == 'donhang' && $query == 'xemdonhang'){
            include("modules/quanlydonhang/xemdonhang.php");           
        }elseif($tam == 'thongke' && $query == 'thongke'){
            include("modules/thongke/thongke.php");           
        }else{
            include("modules/dashboard.php");
        }
    ?>
    
</div>