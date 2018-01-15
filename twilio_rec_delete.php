<?php

// Get the PHP helper library from twilio.com/docs/php/install
require "twilio-php-master/Services/Twilio.php"; // Loads the library

// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACc59aaef285bdce74c573369cfd42212b";
$token = "625afd423f86c224dc2ecd98cd5fcc13";

$client = new Services_Twilio($sid, $token);
// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page

$message = $client->account->messages->delete("SM5a547b6790d368062e8651400511a76d");
echo $message->to;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title></title>
</head>
<body>
<p>Looks ok.</p>
</body>
</html>