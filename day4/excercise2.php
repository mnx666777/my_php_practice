<?php
function mul($num,$upto)
{
    for($init=1;$init<=$upto;$init++){
        // $sum=0;
        $pro=$init*$num;
       echo $num." * ".$init." = ".$pro."<br>";
      
    }
}
mul(5,20);
?>