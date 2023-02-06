<?php
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $sql_sp = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = '".$id_sanpham."'";
        $sql_query_prd = mysqli_query($mysqli,$sql_sp);
        $row = mysqli_fetch_array($sql_query_prd);
    }
?>
<p>số lượng sản phẩm còn lại là: <?php echo $row['soluong'] ?>. Vui lòng nhập lại số lượng cho phù hợp</p>
