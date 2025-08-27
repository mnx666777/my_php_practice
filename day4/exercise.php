<?php
$mark = array(35,45,56);
$user ="Monesh";
function average(){
    global $mark;
    $avg=0;
    foreach($mark as $mrk){
        $avg=($avg+$mrk)/3;
        return $avg;
    }
}

function grade(){
    if(average()<50){
        return "failed";
    }else{
        return "Passed";
    }
}
echo "Hello Moneseh!! <br>";
echo "Your average mark is ".(average())."<br>";
echo " <br> And your grade is ".(grade());
?>