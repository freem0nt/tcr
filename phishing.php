<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description"
          content="How to spot a 'phishing' email. Serving the Middle Georgia Area, including Perry, Warner Robins, Macon, Hawkinsville, Centerville, Marshallville, Fort Valley, Byron, and surrounding areas. Business and at-home service. (478) 987-9489 or (478) 777-3201">
    <title>:: &quot;Phishing&quot; Email Example - Thomas Computer Repair ::</title>
    <link rel="stylesheet" href="styles/tcr.css" type="text/css" media="screen">
</head>
<body>
<?php include('include/background.php'); ?>
<?php include('include/nav.php'); ?>
<div id="content">
    <?php include('include/social_buttons.php'); ?>
    <h1>Phishing Email</h1>
    <div id="wrapper">
        <h2>Here is a Typical Phishing Email</h2>
        <a href="images/phishing/phishing01.png"><img src="images/phishing/phishing01_700.png"
                                                      alt="Screenshot of phishing email"></a>
        <p>It seems to be from "Federal Insurance Company"... but look at the email address shown: <em>colarre51 @ fdic
                . gov</em>. Does that sound like a legitimate email address to you?</p>
        <p>Subject line: FDIC: About your business accounts</p>
        <p>Body: Dear Business Customer, We have important information about your bank. Please click here to view
            information. This includes information on the acquiring bank (if applicable), how your accounts and loans
            are affected, and how vendors can file claims against the receivership.</p>
        <p>Does this read or look like the kind of email a real bank would send to its customers?</p>
        <p>"We have important information about your bank. Please click here to view information."</p>
        <p>As is usual with bogus emails, the grammar is poor.</p>
        <p>Red alerts should be going off immediately as soon as you see an email like this. "Dear Business
            Customer"???</p>
        <p>Anyway, let's have a closer look. When you hover your mouse or point at a link in an email, you should be
            able to see where that link is taking you on the Web. When I point to the first link in this email, look
            what pops up at the bottom:</p>
        <a href="images/phishing/phishing02.png"><img src="images/phishing/phishing02_700.png"
                                                      alt="Screenshot of phishing email"></a>
        <p>"devletim.tk"...</p>
        <p style="font-size:1.5em;">"devletim.tk"???</p>
        <p>A quick <a href="http://www.google.com/search?rls=en&amp;q=tk+domain">Google search</a> informs us that dot
            tk is the top-level domain for Tokelau, a territory of New Zealand. This link will probably NOT take us to
            any site that our bank actually maintains.</p>
        <p>All the links in the email go to the same place:</p>
        <a href="images/phishing/phishing03.png"><img src="images/phishing/phishing03_325.png"
                                                      alt="Screenshot of phishing email"></a>
        <a href="images/phishing/phishing04.png"><img src="images/phishing/phishing04_325.png"
                                                      alt="Screenshot of phishing email"></a>
        <p>Clearly this email is NOT from who it seems to be from. This example is fairly obvious, as it contains no
            graphics or logos from any legitimate organization. Some are more insidious. You should always pay attention
            to where email links are trying to take you - BEFORE you click on them.</p>
        <?php include("include/footer.php"); ?>
    </div><!--Closes #wrapper-->
</div><!--Closes #content-->
</body>
</html>
