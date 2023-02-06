<?php
    $sql_sua_danhmucsanpham = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc =$_GET[id_danhmuc] LIMIT 1";
    $edit_danhmucsanpham = mysqli_query($mysqli,$sql_sua_danhmucsanpham);
?>
<p>Sửa danh muc sản phẩm</p>
<table>
    <form action="modules/quanlydanhmucsanpham/xuly.php?id_danhmuc=<?php echo $_GET['id_danhmuc'] ?>" method="POST">
        <?php
            while($edit = mysqli_fetch_array($edit_danhmucsanpham)){
        ?>
        <tr>
            <td>Tên danh mục</td>
            <td>
                <input type="text" value="<?php echo $edit['tendanhmuc'] ?>" name="tendanhmuc">
            </td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td>
                <input type="text" value="<?php echo $edit['thutu'] ?>" name="thutu">
            </td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm">
            </td>
        </tr>
    </form>
</table>