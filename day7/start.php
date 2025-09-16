<?php
session_start();
$_SESSION['name'] = "Monesh";
echo "ticket given to <a href='check.php'>Go CHECK</a>";
echo "<br><br>".session_id();

?>