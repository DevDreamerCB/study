<?php

$a = 1;

$b = 2;


function Sum()
{
    global $a, $b; //����������Ϊȫ�ֱ���

    $b = $a + $b;

}

Sum();

echo $b;

?>

<?php
//stattic(��̬�ֲ�����)�����ں����ڣ��������ں�����
function a() {
	static $var = 5;
	$var = $var + 1;
	echo $var;
}
 
a();
a();
echo $var;//�����ǿ�
?>

<?php
//global(��̬ȫ�ֱ���)���������κεط�
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
