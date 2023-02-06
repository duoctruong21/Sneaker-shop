<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Admin</title>
</head>

<body>
    <div class="main">
        <?php    
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");
            include("modules/container.php");
            include("modules/footer.php");
            ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            thongke();
            var char = new Morris.Area({
                element: 'mychart',
                xkey: 'date',
                ykeys: ['sales','order','quantity'],
                labels: ['Danh thu','Đơn hàng','Số lượng bán']
            });
            $('.select-date').change(function(){
                var thoigian = $(this).val();
                if(thoigian =='7day'){
                    var text = '7 ngày qua';
                }else if(thoigian =='28day'){
                    var text = '28 ngày qua';
                }else if(thoigian =='90day'){
                    var text = '90 ngày qua';
                }else {
                    var text = '365 ngày qua';
                }
                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType: "JSON",
                    data:{thoigian,thoigian},
                    success:function(data){
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            })
            function thongke(){
                var text = '365 ngày qua';
                $('#text-date').text(text);
                $.ajax({
                    url: "modules/thongke.php",
                    method: "POST",
                    dataType: "JSON",
                    success:function(data){
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                });
            }
        });
    </script>
</body>
</html>