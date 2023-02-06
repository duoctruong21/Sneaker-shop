<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logoshop.jpg" type="image/x-icon" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SNEAKER SHOP</title>
    <script src="./js/changeimg.js"></script>
</head>
<body>
    <div class="main">   
        <?php
            session_start();
            include("admin/config/config.php");
            include("pages/menu.php");
            include("pages/header.php");
            include("pages/slider.php");
            include("pages/container.php");
            include("pages/footer.php");
        ?>
    </div>
</body>
</html>