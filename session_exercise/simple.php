<?php
session_start();
if(!isset($_SESSION['counter'])){
    $_SESSION['counter']=1;
}else{
    $_SESSION['counter']++;
}
echo "session counter =".$_SESSION['counter'];
if(!isset($_COOKIE['monesh'])){
    setcookie('monesh','macha',time()+3600);
}

echo "<br>here is the cookie :".$_COOKIE['monesh'];
echo "<br><br>";
function totals(array $items){
    $sum=0;
    foreach($items as $item){
        $sum+= $item;
    }
    return $sum;
}
$abc=[20,30,40];
echo "here it is : ".implode('+',$abc).PHP_EOL;
echo "<br><br>".totals($abc);

?>