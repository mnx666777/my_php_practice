<?php
$name = "Monesh";
function display(){
    global $name;
    echo "I am displaying global veriable in this function name =".$name;
}
display();
?>