<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="How to use OpenDNS to filter bad websites.">
    <title>:: Web Filtering with OpenDNS - Thomas Computer Repair ::</title>
    <link rel="stylesheet" href="styles/tcr.css" type="text/css" media="screen">
</head>
<body>
<?php include('include/background.php'); ?>
<?php include('include/nav.php'); ?>
<div id="content">
    <?php include('include/social_buttons.php'); ?>
    <h1>web filtering</h1>
    <div id="wrapper">
        <a title="Use OpenDNS to make your Internet faster, safer, and smarter."
           href="http://www.opendns.com/share/"><img class="button"
                                                     src="http://images.opendns.com/buttons/use_opendns_150x40.gif"
                                                     width="150" height="40" style="border:0;" alt="Use OpenDNS"></a>
        <h2>Filter Nasty or Dangerous Stuff Using OpenDNS</h2>
        <h3>Preface</h3>
        <p>If you have children in the home - or even if you don't, but you still want to make sure that no nasty or
            dangerous sites show up in your web browsing - there is a way to proactively filter that type of stuff
            WITHOUT buying any software. That web filtering software in the store will probably slow down your computer.
            Don't get it until after you've tried OpenDNS first.</p>
        <p>The process is simple, and you only need to do it once. You just need to change a setting in your router.</p>
        <p>Now, this tutorial is intended for those who have routers, but a router is not required. You can actually set
            your DNS servers manually on the computer itself. I'm choosing to explain it using routers because most of
            my customers have routers, and because in my opinion it is the easiest way to do it. Also, if you have more
            than one computer in the home or office, setting DNS servers at the router level means changing the settings
            once per building, as opposed to once per computer.</p>
        <p>Note: If you're a Windstream customer and you have one of their Speedstream modems, it also acts as a router,
            so this will work for you.</p>
        <h3>What the heck is "DNS"?</h3>
        <p>Briefly: DNS stands for <span style="font-size:x-large;">D</span>omain <span
                    style="font-size:x-large;">N</span>ame <span style="font-size:x-large;">S</span>ystem (or <span
                    style="font-size:x-large;">S</span>ervice, depending on whom you ask). DNS is a service that runs on
            some of the "server" computers that control the Internet. It is DNS's job to figure out where the servers
            are that contain the websites you're looking for.</p>
        <p>The location of computers on networks and the Internet is identified by addresses called <span
                    class="tooltip" title="Internet Protocol">IP</span> addresses. These are numerical - no words. A
            sample <span class="tooltip" title="Internet Protocol">IP</span> address is 74.220.215.84, which is the
            <span class="tooltip" title="Internet Protocol">IP</span> address of the server that hosts this website as
            of this writing.</p>
        <p>But you didn't type 74.220.215.84 to get here, did you? Of course not. Who wants to have to remember
            something like that? It is much easier to remember something like "thomas computer repair dot com". "Yahoo
            dot com" is easier to remember than 206.190.36.45. "Google dot com" is easier than 74.125.228.38. (As an
            experiment, you can type one of these <span class="tooltip" title="Internet Protocol">IP</span> addresses
            into the address bar of your browser. Type 74.125.228.38, hit Enter and see what comes up.)</p>
        <img src="images/addressbar.png" width="700" height="34"
             alt="Screenshot of Internet Explorer's address bar with an IP address typed into it"
             title="Screenshot of Internet Explorer's address bar with an IP address typed into it">
        <p>The job of DNS is to take a term like "google.com" and map it to 74.125.228.38, much the same way as you or I
            use a phone book to map names to phone numbers. We type words into a browser and DNS figures out what
            numerical IP address those words belong to, and then which server the website is stored on. Without DNS the
            Internet would be too impossibly complex for most of us to use.</p>
        <h3>OpenDNS</h3>
        <p>When you sign up with an <span class="tooltip" title="Internet Service Provider">ISP</span> like Windstream
            or Comsouth or AOL, you sort of "automatically" start using the DNS servers they provide. These <span
                    class="tooltip" title="Internet Service Provider">ISP</span>s have their own DNS servers that they
            maintain. If you are a Windstream customer your DNS servers are 166.102.165.11 and 166.102.165.13. (You
            almost always have at least two in case one fails for some reason, the other can take care of your
            requests.) You can verify this easily: open a command prompt and type "ipconfig -all" without quotes and hit
            Enter. Somewhere in all that mumbo jumbo you should see the DNS servers you're currently using.</p>
        <p>These <span class="tooltip" title="Internet Service Provider">ISP</span>-maintained servers are completely
            non-judgmental about the Web; they do not make reply, they do not reason why, they just give you whatever
            website your computer requests, whether it's a harmless website about growing azaleas or a
            gambling/porn/bomb-making site loaded with malware.</p>
        <p>OpenDNS servers, however, are actively aware of the bad sites out there and, when so instructed, will prevent
            such sites from being delivered to your computers. You just have to tell your network to use OpenDNS servers
            instead of your <span class="tooltip" title="Internet Service Provider">ISP</span>'s.</p>
        <h3>Howto</h3>
        <p>Step one is to <a href="https://store.opendns.com/get/basic"
                             onclick="window.open(this.href,'_blank');return false;">go here and create your account</a>.
        </p>
        <p>Step two is to <a href="https://store.opendns.com/setup/"
                             onclick="window.open(this.href,'_blank');return false;">go to their Setup page</a>, if you
            aren't taken there automatically after creating your account. Then click the Router button.</p>
        <p>Pick your model of router from the list and follow the directions they give. I don't think I can improve on
            their excellent instructions.</p>
        <p>When you're done, you should see a page that confirms you're using their DNS servers now: "Success! You're
            now using OpenDNS." (They have code on their website that can tell.)</p>
        <img src="images/opendns/opendns_success.png" width="500" height="260" alt="Screenshot of OpenDNS Success page"
             title="Screenshot of OpenDNS Success page">
        <p>At this point you should click the "Open DNS Dashboard" link. You'll be asked if you want to "add this
            network". Click that button and you'll be prompted to give the network a name and download an automatic
            updater. <a href="http://www.opendns.com/support/article/90"
                        onclick="window.open(this.href,'_blank');return false;">The updater can also be found here.</a>
            The OpenDNS updater is necessary because your own <span class="tooltip" title="Internet Protocol">IP</span>
            address changes sometimes (unless you pay for a static <span class="tooltip"
                                                                         title="Internet Protocol">IP</span> address,
            and I assume for the purpose of this article that you don't). The updater is tiny, uses almost no resources
            on your computer and is totally safe.</p>
        <p>After you've added your network at OpenDNS and installed and enabled the automatic OpenDNS updater, you can
            get down to business. On your Account page, under the Settings tab, you'll see your network listed.</p>
        <img src="images/opendns/opendns_networks.png" width="600" height="474" alt="Screenshot of OpenDNS dashboard"
             title="Screenshot of OpenDNS dashboard">
        <p>Click your network to get to the page we're looking for.</p>
        <img src="images/opendns/opendns_filtering.png" width="600" height="467"
             alt="Screenshot of OpenDNS filtering level page" title="Screenshot of OpenDNS filtering level page">
        <p>Choose a level of filtering and try it for awhile. I recommend Moderate to start. If a certain level blocks
            any content that you need to be able to view, choose a lower level, or choose Custom and select only the
            specific categories that you want to block. You can also block or allow specific websites from this page
            under "Manage individual domains". When someone tries to visit a website that falls into a blocked category,
            they will instead get a message from OpenDNS:</p>
        <img src="images/opendns/opendns_blocked.png" width="663" height="238"
             alt="Screenshot of OpenDNS blocked site page" title="Screenshot of OpenDNS blocked site page">
        <h3>Conclusion</h3>
        <p>Well, that wasn't so bad. Hopefully this has been of some use to you. By utilizing web filtering at the DNS
            level, you give yourself great control of your home or small office network activity. Short of buying
            expensive software and/or hardware, this is about as simple and effective as it gets - and if you've read
            the rest of this site, you know that I always like "free". I'd love to hear about it if you find this
            article useful. <a href="contact.php">Contact</a></p>
        <p>I'll just add as a footnote that even using OpenDNS only for DNS and not web filtering or anything else is a
            more reliable Web experience than using <span class="tooltip" title="Internet Service Provider">ISP</span>
            servers, because the OpenDNS servers are better maintained and more current in their mappings than the
            typical <span class="tooltip" title="Internet Service Provider">ISP</span>'s.</p>
        <p class="helptext">June 12, 2010</p>
        <p class="anchor"><a href="#top">Start of page &#8593;</a></p>
        <?php include("include/footer.php"); ?>
    </div><!--Closes #wrapper-->
</div><!--Closes #content-->
</body>
</html>

