<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description"
          content="Coupon for the personal computer repair business of Paul Thomas. Serving the Middle Georgia Area, including Perry, Warner Robins, Macon, Hawkinsville, Centerville, Marshallville, Fort Valley, Byron, and surrounding areas. Business and at-home service. (478) 396-2614">
    <title>:: Discount Coupon - Thomas Computer Repair ::</title>
    <link rel="stylesheet" href="styles/tcr.css" type="text/css" media="screen">
</head>
<body>
<?php include('include/background.php'); ?>
<?php include('include/nav.php'); ?>
<div id="content">
    <?php include('include/social_buttons.php'); ?>
    <h1>Coupon</h1>
    <div id="wrapper">
        <h2>Printable coupon:</h2>
        <div id="coupon" class="print-only">
            <script>var pfHeaderImgUrl = '';
                var pfHeaderTagline = '';
                var pfdisableClickToDel = 0;
                var pfHideImages = 0;
                var pfImageDisplayStyle = 'none';
                var pfDisablePDF = 0;
                var pfDisableEmail = 0;
                var pfDisablePrint = 0;
                var pfCustomCSS = 'http://thomascomputerrepair.com/styles/tcr.css';
                var pfBtVersion = '1';
                (function () {
                    var js, pf;
                    pf = document.createElement('script');
                    pf.type = 'text/javascript';
                    if ('https:' == document.location.protocol) {
                        js = 'https://pf-cdn.printfriendly.com/ssl/main.js'
                    } else {
                        js = 'http://cdn.printfriendly.com/printfriendly.js'
                    }
                    pf.src = js;
                    document.getElementsByTagName('head')[0].appendChild(pf)
                })();
            </script>
            <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly"
               onclick="window.print();return false;" title="Printer Friendly and PDF"><img
                        style="border:none;-webkit-box-shadow:none;box-shadow:none;"
                        src="http://cdn.printfriendly.com/button-print-gry20.png" alt="Print Friendly and PDF"/></a>
            <h2>$15 OFF!</h2>
            <h3 style="color:#000">Print this coupon and receive $15 off your service call!</h3>
            <h4>(New customers only)</h4>
            <img src="images/postcard/monitor_logo.png" alt="">
            <p class="coupon_code">Code:
                <?php
                $n = rand(10e16, 10e20);
                $newcode = base_convert($n, 10, 36);
                echo $newcode;
                $date = date("Ymd, g:i a");
                $file = 'coupon_codes.txt';
                $current = file_get_contents($file);
                $current .= $newcode;
                file_put_contents($file, "$newcode\040$date\n", FILE_APPEND | LOCK_EX);
                ?>
            </p>
        </div><!-- Closes coupon -->
        <?php echo "Last modified: " . date("F d Y.", filemtime('4sale.php')); ?>
        <?php include("include/footer.php"); ?>
    </div><!--Closes #wrapper-->
</div><!--Closes #content-->
</body>
</html>

