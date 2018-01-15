<?php

/*

Thank you for choosing FormToEmail by FormToEmail.com

Version 2.2 July 1st 2007

COPYRIGHT FormToEmail.com 2003 - 2007

You are not permitted to sell this script, but you can use it, copy it or distribute it, providing that you do not delete this copyright notice, and you do not remove any reference to FormToEmail.com

For support, please visit: http://formtoemail.com/support/

You can get the Pro version of this script here: http://formtoemail.com/formtoemail_pro_version.php
---------------------------------------------------------------------------------------------------

FormToEmail-Pro (Pro version) Features:

Check for required fields.
Attach file uploads.
Photo CAPTCHA system.
Check for a set cookie.
HTML output option.
CSV output to attachment or file.
Autoresponder.
Show sender's IP address.
Block IP addresses.
Block web addresses or rude words.
Block gobbledegook characters (� � � etc).
Auto redirect to "Thank You" page.
No branding.
Use on multiple sites.

---------------------------------------------------------------------------------------------------

FormToEmail DESCRIPTION

FormToEmail is a contact-form processing script written in PHP. It allows you to place a form on your website which your visitors can fill out and send to you.  The contents of the form are sent to the email address (or addresses) which you specify below.  The form allows your visitors to enter their name, email address and comments.  The script will not allow a blank form to be sent.

Your visitors (and nasty spambots!) cannot see your email address.  The script cannot be hijacked by spammers.

When the form is sent, your visitor will get a confirmation of this on the screen, and will be given a link to continue to your homepage, or other page if you specify it.

Should you need the facility, you can add additional fields to your form, which this script will also process without /making any additional changes to the script.  You can also use it to process other forms.  The script will handle the "POST" or "GET" methods.  It will also handle multiple select inputs and multiple check box inputs.  If using these, you must name the field as an array using square brackets, like so: <select name="fruit[]" multiple>.  The same goes for check boxes if you are using more than one with the same name, like so: <input type="checkbox" name="fruit[]" value="apple">Apple<input type="checkbox" name="fruit[]" value="orange">Orange<input type="checkbox" name="fruit[]" value="banana">Banana

** PLEASE NOTE **  If you are using the script to process your own forms (or older FormToEmail forms) you must ensure that the email field is named correctly in your form, thus: <input type="text" name="email" etc>.  Note the lower case "email".  If you don't do this, you won't be able to see who the email is from and the script won't be able to check the validity of the email.  If you are using the form code below, you don't need to check for this.

This is a PHP script.  In order for it to run, you must have PHP (version 4.1.0 or later) on your webhosting account, and have the PHP mail() function enabled and working.  If you are not sure about this, please ask your webhost about it.

SETUP INSTRUCTIONS

Step 1: Put the form on your webpage
Step 2: Enter your email address and (optional) continue link below
Step 3: Upload the files to your webspace

Step 1:

To put the form on your webpage, copy the code below as it is, and paste it into your webpage:

<form action="FormToEmail.php" method="post">
<table border="0" bgcolor="#ececec" cellspacing="5">
<tr><td>Name</td><td><input type="text" size="30" name="name"></td></tr>
<tr><td>Email address</td><td><input type="text" size="30" name="email"></td></tr>
<tr><td valign="top">Comments</td><td><textarea name="comments" rows="6" cols="30"></textarea></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="Send"><font face="arial" size="1">&nbsp;&nbsp;<a href="http://FormToEmail.com">Form Processor</a> by FormToEmail.com</font></td></tr>
</table>
</form>

Step 2:

Enter your email address.

Enter the email address below to send the contents of the form to.  You can enter more than one email address separated by commas, like so: $my_email = "bob@example.com,sales@example.co.uk,jane@example.com";

*/

$my_email = "paul@thomascomputerrepair.com";

/*

Enter the continue link to offer the user after the form is sent.  If you do not change this, your visitor will be given a continue link to your homepage.

If you do change it, remove the "/" symbol below and replace with the name of the page to link to, eg: "mypage.htm" or "http://www.elsewhere.com/page.htm"

*/

$continue = "../index.php";

/*

Step 3:

Save this file (FormToEmail.php) and upload it together with your webpage containing the form to your webspace.  IMPORTANT - The file name is case sensitive!  You must save it exactly as it is named above!  Do not put this script in your cgi-bin directory (folder) it may not work from there.

THAT'S IT, FINISHED!

You do not need to make any changes below this line.

*/

$errors = array();

// Remove $_COOKIE elements from $_REQUEST.

if (count($_COOKIE)) {
    foreach (array_keys($_COOKIE) as $value) {
        unset($_REQUEST[$value]);
    }
}

// Check all fields for an email header.

function recursive_array_check_header($element_value)
{

    global $set;

    if (!is_array($element_value)) {
        if (preg_match("/(%0A|%0D|\n+|\r+)(content-type:|to:|cc:|bcc:)/i", $element_value)) {
            $set = 1;
        }
    } else {

        foreach ($element_value as $value) {
            if ($set) {
                break;
            }
            recursive_array_check_header($value);
        }

    }

}

recursive_array_check_header($_REQUEST);

if ($set) {
    $errors[] = "You cannot send an email header";
}

unset($set);

// Validate name field.

if (isset($_REQUEST['name']) && !empty($_REQUEST['name'])) {

    if (preg_match("/[^a-z' -]/i", stripslashes($_REQUEST['name']))) {
        $errors[] = "You have entered an invalid character in the name field";
    }

}

// Validate email field.

if (isset($_REQUEST['email']) && !empty($_REQUEST['email'])) {

    if (preg_match("/(%0A|%0D|\n+|\r+|:)/i", $_REQUEST['email'])) {
        $errors[] = "Email address may not contain a new line or a colon";
    }

    $_REQUEST['email'] = trim($_REQUEST['email']);

    if (substr_count($_REQUEST['email'], "@") != 1 || stristr($_REQUEST['email'], " ")) {
        $errors[] = "Email address is invalid";
    } else {
        $exploded_email = explode("@", $_REQUEST['email']);
        if (empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])) {
            $errors[] = "Email address is invalid";
        } else {
            if (substr_count($exploded_email[1], ".") == 0 || substr_count($exploded_email[1], ".") > 3) {
                $errors[] = "Email address is invalid";
            } else {
                $exploded_domain = explode(".", $exploded_email[1]);
                if (in_array("", $exploded_domain)) {
                    $errors[] = "Email address is invalid";
                } else {
                    foreach ($exploded_domain as $key => $value) {
                        if ($key == 0) {
                            if (strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i', $value)) {
                                $errors[] = "Email address is invalid";
                                break;
                            }
                        } elseif (strlen($value) > 6 || !preg_match('/^[a-z0-9]+$/i', $value)) {
                            $errors[] = "Email address is invalid";
                            break;
                        }
                    }
                }
            }
        }
    }

}

// Remove leading whitespace from all values.

function recursive_array_check(&$element_value)
{

    if (!is_array($element_value)) {
        $element_value = ltrim($element_value);
    } else {

        foreach ($element_value as $key => $value) {
            $element_value[$key] = recursive_array_check($value);
        }

    }

    return $element_value;

}

recursive_array_check($_REQUEST);

// Check referrer is from same site.

if (!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']))) {
    $errors[] = "You must enable referrer logging to use the form";
}

// Check for a blank form.

function recursive_array_check_blank($element_value)
{

    global $set;

    if (!is_array($element_value)) {
        if (!empty($element_value)) {
            $set = 1;
        }
    } else {

        foreach ($element_value as $value) {
            if ($set) {
                break;
            }
            recursive_array_check_blank($value);
        }

    }

}

recursive_array_check_blank($_REQUEST);

if (!$set) {
    $errors[] = "You cannot send a blank form";
}

unset($set);

// Display any errors and exit if errors exist.

if (count($errors)) {
    foreach ($errors as $value) {
        print "$value<br>";
    }
    exit;
}

if (!defined("PHP_EOL")) {
    define("PHP_EOL", strtoupper(substr(PHP_OS, 0, 3) == "WIN") ? "\r\n" : "\n");
}

// Build message.

function build_message($request_input)
{
    if (!isset($message_output)) {
        $message_output = "";
    }
    if (!is_array($request_input)) {
        $message_output = $request_input;
    } else {
        foreach ($request_input as $key => $value) {
            if (!empty($value)) {
                if (!is_numeric($key)) {
                    $message_output .= str_replace("_", " ", ucfirst($key)) . ": " . build_message($value) . PHP_EOL . PHP_EOL;
                } else {
                    $message_output .= build_message($value) . ", ";
                }
            }
        }
    }
    return rtrim($message_output, ", ");
}

$message = build_message($_REQUEST);

$message = $message . PHP_EOL . PHP_EOL . "-- " . PHP_EOL . "Thank you for using FormToEmail from http://FormToEmail.com";

$message = stripslashes($message);

$subject = 'Comments from thomascomputerrepair.com';

$headers = "From: " . $_REQUEST['email'];

mail($my_email, $subject, $message, $headers);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>:: Confirmation - Thomas Computer Repair ::</title>
    <link rel="stylesheet" href="../styles/tcr.css" type="text/css">
</head>
<body>
<?php include('include/background.php'); ?>
<?php include('include/nav.php'); ?>
<div id="content">
    <h1>Email Sent</h1>
    <h2>Thanks, <?php print stripslashes($_REQUEST['name']); ?>!</h2>
    <p>Your email has been sent.</p>
    <p><a href="<?php print $continue; ?>">Click here</a> to go back to our home page.</p>
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
    <p>Thanks to <a href="http://FormToEmail.com">FormToEmail.com</a> for a great email script!</p>
    <?php include('include/footer.php'); ?>
</div>
</body>
</html>