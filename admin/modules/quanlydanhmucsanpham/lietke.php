<div class="lietkesp">
<?php
    $sql_lietke_danhmucsanpham = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $show_danhmucsanpham = mysqli_query($mysqli,$sql_lietke_danhmucsanpham);
?>

<table>
    <tr>
        <th>STT</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
        $i =0;
        while($row = mysqli_fetch_array($show_danhmucsanpham)){
            $i++;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td>
            <a href="modules/quanlydanhmucsanpham/xuly.php?id_danhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> | <a href="index.php?action=quanlydanhmucsanpham&query=edit&id_danhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
</div>
