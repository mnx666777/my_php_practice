<?php
session_start();
$name=$POST[$name];
$_SESSION['flash']= "Your form has been submitted successfully";
header('location:form.php');
exit;
?>