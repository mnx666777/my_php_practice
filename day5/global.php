<?php
$message = "This is my php";
function showme(){
    global $message;
    echo $message;
}

showme();
?>