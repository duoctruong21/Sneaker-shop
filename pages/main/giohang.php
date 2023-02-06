
<table style="width:100%" class="table_giohang">
    <tr>
        <th>STT</th>
        <th>hình ảnh</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i=0;
    $tongtien=0;
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $cart_Item){
                $thanhtien = $cart_Item['gia']*$cart_Item['soluong'];
                $i++;
                $tongtien += $thanhtien;
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><img src="admin/modules/quanlysanpham/uploads/<?php echo $cart_Item['hinhanh'] ?>" width="100px" alt=""></td>
        <td><?php echo $cart_Item['masanpham'] ?></td>
        <td><?php echo $cart_Item['tensanpham'] ?></td>
        <td>
            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_Item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
            <?php echo $cart_Item['soluong'] ?>
            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_Item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
        </td>
        <td><?php echo number_format($cart_Item['gia'],0,',','.').'VNĐ' ?></td>
        <td><?php echo number_format($thanhtien,0,',','.').'VNĐ' ?></td>
        <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_Item['id'] ?>">Xóa</a></td>
    </tr>
    <?php
            }
        ?>
        <tr>
            <td colspan="8" style="border: none;">
                <div class="chucnang_giohang">
                    <p style="float: right;">Tổng tiền:<?php echo number_format($tongtien,0,',','.').'VNĐ' ?></p>
                    <a style="float: left;" href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a>
                    <div style="clear:both;"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="8">
                <div class="td_dathang">
                    <?php
                        if(isset($_SESSION['dangky'])){?>
                    <p><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
                    <?php
                        }else{
                    ?>
                    <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                    <?php
                        }
                    ?>
                </div>
            </td>
        </tr>
    <?php
        }else{
    ?>
    <tr>
        <td><p>Giỏ hàng trống</p></td>
    </tr>
    <?php
        }
    ?>
</table>