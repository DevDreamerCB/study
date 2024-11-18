<?php 
function abc(){
    $a=1+1;
    return $a;   //把$a的值返回给函数abc()
}

$a = abc;

echo $a . "</br>";

$a = abc();

echo $a. "</br>";

?>