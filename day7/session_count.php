<?php
session_start();
// if (!isset($_SESSION['count'])){
//     $_SESSION['count']=0;
// }
$_SESSION['count']++;
echo "the number of times of times you visited the page is ".$_SESSION['count'];
?>