<?php 
require 'first.php';
$monesh = new person("moneshSingh",30);
$jane = new person("Jane Smith", 28);
echo $monesh->introduce();
$monesh->newage(23);
echo $monesh->introduce();
?>
