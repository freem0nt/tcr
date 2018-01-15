<?php

if (mail("defrag100@gmail.com", "Testing", "Hello World!")) {
    echo "mail sent to defrag";
} else {
    echo "mail send failed";
}

?>
