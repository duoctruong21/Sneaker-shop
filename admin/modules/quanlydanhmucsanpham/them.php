<div class="themsanpham">
<table>
    <form action="modules/quanlydanhmucsanpham/xuly.php" method="POST">
        <tr>
            <td>Tên danh mục</td>
            <td>
                <input type="text" name="tendanhmuc" value="" id="tendanhmuc">
            </td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td>
                <input type="text" name="thutu" value="" id="thutu">
            </td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td>
                <input type="submit" onclick="no_value()" id="themdanhmuc" value="Thêm danh mục sản phẩm">
            </td>
        </tr>
    </form>
</table>
</div>    

<script>
    var name = document.getElementById('tendanhmuc');
    var stt = document.getElementById('thutu');
    function no_value(){
        if(name.value !="" && stt.value != ""){
            document.getElementById('themdanhmuc').name ="themdanhmuc";
        }else{
            alert('Vui lòng nhập tên và thứ tự');
        }

    }
</script>