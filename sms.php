<?php

require "twilio-php-master/Services/Twilio.php";

$AccountSid = "ACc59aaef285bdce74c573369cfd42212b";
$AuthToken = "625afd423f86c224dc2ecd98cd5fcc13";

$client = new Services_Twilio($AccountSid, $AuthToken);

$smsname = ($_REQUEST['smsname']);
$smsnumber = ($_REQUEST['smsnumber']);
$smsbody = wordwrap($_REQUEST['smsmessage'], 70);

// Make sure number isn't blank because of stupid assholes. 20150324

if (empty($smsnumber)) {
    echo "How am I supposed to respond if you don't fill in your number? :-\ Please go back and try again.";
    die();
}
$headers = "From: " . $_REQUEST['smsnumber'];
$message = $client->account->messages->create(array(
    "From" => "478-394-4241",
    "To" => "478-287-4602",
    "Body" => "Cell: " . $smsnumber . "\r\n" . $smsname . "\r\n" . $smsbody,
    "Headers" => $headers,
));

//echo "Sent message {$message->sid}";

?>


<!DOCTYPE html>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>:: Confirmation - Thomas Computer Repair ::</title>

<link rel="stylesheet" href="../styles/tcr.css" type="text/css">

<body>

<?php include('include/background.php'); ?>

<?php include('include/nav.php'); ?>

<div id="content">

    <h1>Text Message Sent</h1>

    <h2>Thanks, <?php print stripslashes($_REQUEST['smsname']); ?>!</h2>

    <p>Your text has been sent.</p>

    <p>I will get back to you as soon as I can.</p>

    <p><a href="http://thomascomputerrepair.com">Click here</a> to go back to my home page.</p>

    <div id="wrapper">

        <dl>

            <dt><a href="../phishing.php">Example of a phishing email with screenshots</a></dt>

            <dd>Some screenshots of a recent email I received - one of many that are similar - and explanation of why
                emails like this should be disregarded at a glance.
            </dd>

            <dt><a href="../opendns.php">Filtering web content with OpenDNS</a></dt>

            <dd>An explanation of DNS and how to use the free <a href="http://www.opendns.com/"
                                                                 onclick="window.open(this.href,'_blank');return false;">OpenDNS</a>
                service to filter out objectionable web content from computers in your home or small office.
            </dd>

            <dt><a href="../gift.php">A Great Gift Idea</a></dt>

            <dd>Googling for a great gift to give? (Like language with a lot of alliteration?) Here is what one of my
                customers gave to her father for his birthday.
            </dd>

            <dt><a href="../av2009.php">Avoid bogus "Antivirus 2009"</a></dt>

            <dd>You're surfing around the Web, and you notice a little popup down by your clock that says you may be
                infected with spyware. So you click the popup and it's downhill from there.
            </dd>

            <dt><a href="../securitytools2010.php">Avoid bogus "Security Tools 2010"</a></dt>

            <dd>This one works just like the "Antivirus 2009" above, but it looks different. I've included some
                screenshots here also.
            </dd>

            <dt><a href="../nvidia-settings-kde.php">Make nvidia-settings sticky in KDE</a></dt>

            <dd>Set nvidia-settings to run at startup. (This is strictly Linux stuff.)</dd>

            <dt><a href="../converter.php">Office 2007 Converter</a></dt>

            <dd>Having trouble opening a document that someone just sent you in email?</dd>

            <dt><a href="../xps.php">Paul's new (Oct '08) computer</a></dt>

            <dd>My Dell XPS 630i.</dd>

        </dl>

    </div>

    <?php include("include/footer.php"); ?>

</div>

</body>

</html>
