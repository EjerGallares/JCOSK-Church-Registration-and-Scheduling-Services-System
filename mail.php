<?php
$receiver = "ejer.gallares14@gmail.com";
$subject = "Email Test via PHP using Localhost";
$body = "Ok na no pre?";
$sender = "jcoskcyouthalive@gmail.com";
if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>