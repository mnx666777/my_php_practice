<?php
$name = "Monesh";
$mark = 79;
$grade ="A";
echo $name."<br>".($mark)."<br>".($grade);
define("Company","tweakbrains");
echo "<br>"."<br>";
echo "<br>"."Welcome to ".(Company)."  ".($name);
$x = 20;
$y = 30;
echo "<br>".($x+$y);
echo "<br>".($x*$y);
echo "<br>".($x-$y);
echo "<br>".($x/$y);
echo "<br><br>";
if($mark >= 40 && $grade =="B"){
    echo "You pass the Exam";
}else{
    echo "Better luck next time";
}
?>