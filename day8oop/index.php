<?php
require 'person.php';
$monesh = new person('monesh',25,'playing');
$p1 = new person;
// $macha = new person;
echo $monesh->introduce();
echo "<br>";
$monesh->setage(56);
echo "and now I am {$monesh->getage()} years old<br>";
// echo $monesh->age;
echo "<br>";
$monesh->setname('kaluton');
$monesh->getname();
echo $monesh->introduce();
echo "<br>".person::$count;

?>