<?php
$x = 74;
if($x % 2 ==0){
    echo "$x is even Number";
}else{
    echo "$x is odd number";
}
echo "<br><br>";
$day = "sunday";
switch($day){
    case "tuesday" :
        echo "This is a fine day";
        break;
    case "monday" :
        echo "this is a good day";
        break;
        default :
        echo "just another day";
}
echo "<br><br>";
for($i=0;$i<31;$i+=2){
    echo "$i is divisible by two <br>";
}
echo "<br><br>";
$fruits = [
    "apple"=>"red",
    "banana"=>"yellow",
    "pear"=>"green"
];
foreach($fruits as $fruit=>$color){
    echo "$fruit is $color <br>";
}
foreach($fruits as $fruit){
    echo "this is $fruit <br>";
}
echo "<br><br>";
$p = 1;
while($p<21){
    echo "the number is $p <br>";
    $p++;
}
?>