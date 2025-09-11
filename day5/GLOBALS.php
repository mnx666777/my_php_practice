<?php
// $greet = ['This is GLOBAL',
//             'another one'];
// function grt(){
//     print_r($GLOBALS['greet']);
// }
// grt();
// $counter = 10;
// function add(){
//     global $counter;
//     $counter = $counter+5;
//     return $counter;
// }
// echo $counter;
// echo add();
// echo "<br>";
// echo "<br>";
// echo $counter;

$counter =10;
function add(){
    echo $GLOBALS['counter']+10;
}
add();


?>