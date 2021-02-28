<?php 
include "include/init.php";
include_once "controllers/driverController.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#2d3436" />
    <link rel="stylesheet" href="assets/main.css">
    <link rel="stylesheet" href="assets/wow/animate.css">
    <link rel="stylesheet" href="assets/wow/site.css">
    <title>driver-dashboard</title>
    <style>
        .wow:first-child {
            visibility: hidden;
        }
    </style>
</head>
<body>

<?php
if ($vipdays > 0) {
?>
<div class="remain">
    <p style="color: white;"><?php echo $vipdays; ?>روز تا پایان وی آی پی</p>
</div>
<?php
}
?>

<div class="driver-container">
    <div class="profile">
        <div class="acc">
            <img src="assets/images/avatar.png" alt="">
            <p class="d-name"> <?php echo $driver['name'];?>(<?php echo $driver['code']; ?>)  </p>
            <p class="exit-res"><a href="exit.php"> خروج از حساب</a></p>

        </div>

        <div class="money">
            <p>موجودی</p>
            <p><?php echo $driver['balance']; ?></p>
        </div>
    </div>
<!---------------------------->

<?php if ($vipdays > 0) { ?>
    <div class="dashboard wow fadeInUp">
        <?php 
        if (!empty($pays)){
            foreach($pays as $item) {
        ?>
                <div class="dash-card ">
                    <div class="dash-top">
                        <p>آخرین واریز</p>
                    </div>
                    <div class="dash-bottom">
                        <p style="font-weight: bold;color:#5fff5f"><?php echo $item['price']; ?> تومان</p>
                        <p style="font-size:12px"><?php echo timetofarsi($item['date']); ?></p>
                        <p style="font-size:12px"><?php echo $item['time']; ?></p>
                        <p style="font-size:12px"><?php echo $item['payid']; ?></p>
                        <p style="font-size:12px;letter-spacing: 1px">از <?php echo $item['phone']; ?></p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!--        -->
    <div class="pagination">
            <?php
            for ($z = 1; $z <= $count; $z++) {
                $style = '';
                if (isset($_GET['page'])) {
                    if ($_GET['page'] == $z) {
                        $style = "class='active'";
                    } else {
                        $style = '';
                    }
                }
                echo '<a ' . $style . 'href="driver.php?page=' . $z . '">' . $z . '</a>';
            }
            ?>
    </div>

<?php } else {
    $msgvip = "اعتبار حساب شما به پایان رسیده. لطفا نسبت به تمدید آن اقدام فرمایید.";
    phpAlert($msgvip);
} ?>
    <div class="vip ">

        <div class="month6">
            <div class="title-vip6 wow slideInDown">
                <a href="driver.php?vip=6"><h3>اکانت 6 ماهه 50 هزار تومان</h3></a>
            </div>
            <img src="assets/images/vip.jpg" alt="">
        </div>

        <div class="month12">
            <div class="title-vip12 wow slideInDown ">
                <a href="driver.php?vip=12"><h3>اکانت 12 ماهه 80 هزار تومان</h3></a>
            </div>
            <img src="assets/images/vip.jpg" alt="">
        </div>
    </div>    
</div>


<script src="assets/wow/wow.min.js"></script>
<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset:       100,
            callback:     function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
        var section = document.createElement('section');
        section.className = 'section--purple wow fadeInDown';
        this.parentNode.insertBefore(section, this);
    };
</script>
</body>
</html>