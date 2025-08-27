<?php
$data = [
    ["Monesh","Male",30],
    ["Macha","Female",31],
    ["Deben","Male",70],
    ["Bhani","Female",68]
];
// echo $data[1][2];
foreach($data as $info){
    foreach($info as $details){
        echo $details." - ";
    }
    echo "<br>";
}
?>