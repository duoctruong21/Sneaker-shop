<div class="container_main">
<div class="themsanpham">
<p>Thêm sản phẩm</p>
<table >
    <form action="modules/quanlysanpham/xuly.php" method="POST" enctype="multipart/form-data">
        <tr>
            <td style="width:30%"><label for="">Tên sản phẩm</label></td>
            <td>
                <input type="text" name="tensanpham" value="" id="tensanpham">
            </td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td>
                <input type="text" name="masp" value="" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Giá</td>
            <td>
                <input type="text" name="gia" value="" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td>
                <input type="text" name="soluong" value="" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="hinhanh" value="" id="thutu">
            </td>
        </tr>
        <tr>
            <td>Tóm tắt</td>
            <td>
                <textarea name="tomtat" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Nội dung</td>
            <td>
                <textarea name="noidung" id="" cols="30" rows="10"></textarea>
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

                    ?>
                    <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="trangthai" id="">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td>
                <input type="submit" onclick="no_value()" name="themsanpham" value="Thêm sản phẩm">
            </td>
        </tr>
    </form>
</table>
</div>

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