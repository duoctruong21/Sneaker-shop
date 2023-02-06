<?php
    session_start();
    include("../../admin/config/config.php");
    //them so luong
    if(isset($_GET['cong'])){
        $id =$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !=$id){
                $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                $_SESSION['cart'] = $product;
            }else{
                if($cart_item['soluong']<10){
                    $tangsoluong = $cart_item['soluong'] +1;
                    $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$tangsoluong,
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                }else{
                    $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                }
                $_SESSION['cart'] = $product;
            }            
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //tru so luong
    if(isset($_GET['tru'])){
        $id =$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !=$id){
                $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                $_SESSION['cart'] = $product;
            }else{
                if($cart_item['soluong']>1){
                    $giamsoluong = $cart_item['soluong'] -1;
                    $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$giamsoluong,
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                }else{
                    $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                }
                $_SESSION['cart'] = $product;
            }            
        }
        header('Location:../../index.php?quanly=giohang');
    }
    //xoa san pham
    if(isset($_GET['xoa']) && $_SESSION['cart']){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id'] !=$id){
                $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
            }
            $_SESSION['cart'] = $product;
            header('Location:../../index.php?quanly=giohang');
        }
    }
    if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    //them sanpham vào gio hang
    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id = $_GET['id_sanpham'];
        $soluong=1;
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_product =array(array('tensanpham'=>$row['tensanpham'],'id'=>$id, 'soluong'=>$soluong,
            'gia'=>$row['gia'],'hinhanh'=>$row['hinhanh'],'masanpham'=>$row['masanpham']));
            //kiểm tra session gio hang ton tại chưa
            if(isset($_SESSION['cart'])){
                $found = false;
                //kiem tra du lieu co trong gio hang khong
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id']==$id){
                        $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong']+1,
                        'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                        $found = true;
                    }else{
                        $product[] =array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'], 'soluong'=>$cart_item['soluong'],
                        'gia'=>$cart_item['gia'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']);
                    }
                }
                if($found == false){
                    //lien ket du lieu
                    $_SESSION['cart']=array_merge($product,$new_product);
                }else{
                    $_SESSION['cart']=$product;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');
    }
?>