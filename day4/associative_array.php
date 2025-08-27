<?php
$cars = [
    "hyundai"=> "grandi10",
    "mahindra"=> "thar",
    "tata"=>"tiago"
];
foreach($cars as $car=>$name){
    echo $car." - ".($name)."<br>";
}