<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="How to set KDE so that your nvidia-settings will be applied at startup.">
    <title>:: Setting Nvidia-Settings to Startup With KDE - Thomas Computer Repair ::</title>
    <link rel="stylesheet" href="styles/tcr.css" type="text/css" media="screen">
</head>
<body>
<?php include('include/background.php'); ?>
<?php include('include/nav.php'); ?>
<div id="content">
    <?php include('include/social_buttons.php'); ?>
    <h1>Nvidia-Settings</h1>
    <div id="wrapper">
        <h2>Setting nvidia-settings To Run at Startup</h2>
        <p>Presumably you're here because you've noticed that when you adjust brightness or sharpness or "Digital
            Vibrance" with nvidia-settings, your adjustments go away the next time you log in. You can always run
            nvidia-settings and that will re-apply your settings, but who wants to go to that much trouble?</p>
        <a href="images/nvidia-settings.png"><img class="float_right" src="images/nvidia-settings_150.png"
                                                  alt="screenshot of nvidia-settings"
                                                  title="Screenshot of nvidia-settings"></a>
        <p>The goal is to have the nvidia-settings <em>adjustments</em> applied automatically on login, without having
            the actual application window come up.</p>
        <p>Here's what I did:</p>
        <ol>
            <li>Go to ~/.kde/Autostart</li>
            <li>Create a new text file named nvidia-startup</li>
            <li>Paste this into the text file: <code>#!/usr/bin/env bash<br>/usr/bin/nvidia-settings
                    --load-config-only<br></code>... making sure that there's a new line after the code
            </li>
            <li>Make the file executable (right-click file, Permissions, check box, OK)</li>
        </ol>
        <p>That's it! Restart the computer and watch it work.</p>
        <p>Note that this will affect only KDE; if you log into Gnome for instance, this file won't make a
            difference.</p>
        <p>In looking for a solution to this problem, I found other methods that involved modifying ~/.xinitrc or
            creating the file if it doesn't exist, but for whatever reason I tried it this way and it seems the
            simplest, since KDE is all I use.</p>
        <p>Did this work for you? I'd love to hear one way or the other. <a href="contact.php">Email me</a>.</p>
        <?php include("include/footer.php"); ?>
    </div><!--Closes #wrapper-->
</div><!--Closes #content-->
</body>
</html>

