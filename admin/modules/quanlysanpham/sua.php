<?php
    $sql_sua_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = $_GET[id_sanpham] LIMIT 1";
    $edit_sanpham = mysqli_query($mysqli,$sql_sua_sanpham);
?>
<p>Sửa sản phẩm</p>
<table>
    <?php
        while($row = mysqli_fetch_array($edit_sanpham)){
    ?>
    <form action="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $_GET['id_sanpham'] ?>" method="POST" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="tensanpham" value="<?php echo $row['tensanpham'] ?>" id="tensanpham">
            </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td>
                <input type="text" name="masp" value="<?php echo $row['masanpham'] ?>" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Giá</td>
            <td>
                <input type="text" name="gia" value="<?php echo $row['gia'] ?>" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td>
                <input type="text" name="soluong" value="<?php echo $row['soluong'] ?>" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh" value="<?php echo $row['hinhanh'] ?>" id="thutu">
                <img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" width="100px" alt="">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea name="tomtat" id="" cols="30" rows="10" ><?php echo $row['tomtat'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea name="noidung" id="" cols="30" rows="10" ><?php echo $row['noidung'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Danh mục</td>
            <td>
                <select name="danhmuc" id="">
                    <?php 
                        $sql_danhmucsanpham = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmucsanpham = mysqli_query($mysqli,$sql_danhmucsanpham);
                        while($row_danhmuc = mysqli_fetch_array($query_danhmucsanpham)){
                            if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){
                    ?>
                    <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                        }else{
                            ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="trangthai" id="">
                    <?php
                        if($row['tinhtrang']==1){
                    ?>
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php 
                        }else{
                    ?>
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php 
                        }
                    ?>
                </select>
            </td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td></td>
            <td>
                <input type="submit" onclick="no_value()" name="suasanpham" value="Sửa sản phẩm">
            </td>
        </tr>
    </form>
</table>
<script>
    var name = document.getElementById('tensanpham');
    var stt = document.getElementById('thutu');
    function no_value(){
        if(name.value !="" && stt.value != ""){
            document.getElementById('themsanpham').name ="themsanpham";
        }else{
            alert('Vui lòng nhập tên và thứ tự');
        }

    }
</script>