<div class="lietkesp">
<?php
    $sql_lietke_sanpham = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY gia DESC";
    $show_sanpham = mysqli_query($mysqli,$sql_lietke_sanpham);
?>

<p>Liệt kê danh mục sản phẩm</p>
<table>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Giá</th>
        <th>hình ảnh</th>
        <th>Tóm tắt</th>
        <th>Nội dung</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>
    <?php
        $i =0;
        while($row = mysqli_fetch_array($show_sanpham)){
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><?php echo $row['masanpham'] ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo $row['gia'] ?></td>
        <td><img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px" alt=""></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php echo $row['noidung'] ?></td>
        <td><?php 
            if($row['trangthai']==1){
                echo 'Kích hoạt';
            }else {
                echo 'Ẩn';
            }
        ?></td>
        <td>
            <a href="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $row['id_sanpham'] ?>">Xóa</a> | <a href="index.php?action=quanlysanpham&query=edit&id_sanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
</div>
</div>