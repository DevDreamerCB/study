<?php 
function abc(){
    $a=1+1;
    return $a;   //��$a��ֵ���ظ�����abc()
}

$a = abc;

echo $a . "</br>";

$a = abc();

echo $a. "</br>";

?>