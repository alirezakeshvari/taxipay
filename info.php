<?php 
include_once "page/header.php"; 
include_once "controllers/infoController.php";
?>



<body>

<div class="container-animate-login">
    <div class="animation-hacheena">
        <a href="">
            <h1>
                <span>T</span>
                <span>A</span>
                <span>X</span>
                <span>I</span>
                <span>P</span>
                <span>A</span>
                <span>Y</span>
            </h1>
        </a>

    </div>

    <div class="main-animate-login">

        <p style="font-size: 15px"> نام راننده :  <?php echo $driver['name']; ?></p>
        <p style="font-size: 15px">کد راننده : <?php echo $driver['code']; ?></p>
        <p style="font-size: 15px">مبلغ پرداختی : <?php echo $_SESSION['price']; ?> تومان</p>


        <div class="signin-btn-animate-login">
            <form action="" method="POST">
                <input type="submit" name="btnpay" value="پرداخت نهایی">
            </form>
        </div>
    </div>
    <div class="policy-animate-login">
        <p>تمامی حقوق مادی و معنوی این وبسایت متعلق به تاکسی پی میباشد</p>
    </div>


</div>

</body>
</html>