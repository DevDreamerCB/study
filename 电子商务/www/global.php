<?php

$a = 1;

$b = 2;


function Sum()
{
    global $a, $b; //在里面声明为全局变量

    $b = $a + $b;

}

Sum();

echo $b;

?>

<?php
//stattic(静态局部变量)作用于函数内，不能用在函数外
function a() {
	static $var = 5;
	$var = $var + 1;
	echo $var;
}
 
a();
a();
echo $var;//这里是空
?>

<?php
//global(静态全局变量)可以作用任何地方
//$var2=0;

function a2() {
	global $var2;
	$var2 = $var2 + 1;
	echo $var2;
}
 
a2();
a2();
echo $var2;
?>
