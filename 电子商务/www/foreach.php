<?php
/*
foreach foreach �������ѭ���������顣
ÿ����һ��ѭ������ǰ����Ԫ�ص�ֵ�ͻᱻ��ֵ�� value ����
������ָ�����һ���ƶ��� - �Դ����ơ�
*/
?>

<?php
$arr = array("one", "two", "three");

foreach ($arr as $value)
{
  //echo "Value: " . $value . "<br>";
  echo "Value:  $value" . "<br>";
  //echo 'Value: $value' . "<br>";
}
?>




<?php

/*
��PHP 5��ʼ�������ͨ���ڱ���ǰ��ʹ��&���������޸������Ԫ�أ�
�����Ļ�����������ã�������ֵ��
*/

$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
  print $value. "<br>";
  $value = $value * 2;
}
//reset($arr);
unset($value);
foreach ($arr as $value) {
  print $value. "<br>";
}
// $arr is now array(2, 4, 6, 8)
unset($value);  //break the reference with the last element
?>

<?php 
$language=array("ASP","PHP","JSP");
//list($key,$value) ��each()һ��ʹ���ǽ����鵱ǰָ����ָ��Ԫ�ļ�/ֵ�Էֱ�ֵ������
while((list($key,$value)=each($language))){
 echo $key."=>".$value;
 echo "<br>";
}
?>


<?php
$arr = array("Apple", "Banana", "Orange");
//reset() ������������ڲ�ָ��ָ���һ��Ԫ�أ����������Ԫ�ص�ֵ�� ��ʧ�ܣ��򷵻� FALSE��
reset($arr);
//each()�Ὣ���õ�����ĵ�ǰ��Ԫ�Ľ�/ֵ�Է��أ����ҽ�����ָ�������ƶ�һ��λ
$i=0;
while (list(, $value) = each($arr)) {
    echo "Fruit: $value<br />\n";
}

foreach ($arr as $value) {
  $i++;
  if ($i >2) break;

    echo "Fruit: " . $value. "<br />\n";
    echo "Fruit: $value <br />\n";
}
?>

<?php
/*
���ϰ汾��PHP��list()�Ǻ�each()һ��������������ģ�
��������������PHP5���Ѿ���foreach($array as $key=>$value)�����棬
����list()����˵�Ѿ�û��ʲô���á�
��������ͼ�������ǰ�漸��Ԫ�ص�ֵ����list()���������еı���ʱ�����е��õ�
*/
?>




<?php
//Program List������foreach��ʹ������
$arr = array("Apple", "Banana", "Orange");
reset($arr);
while (list($key, $value) = each($arr)) {
    echo "Key: $key; Value: $value<br />\n";
}
reset($arr);
foreach ($arr as $key => $value) {
    echo "Key: $key; Value: $value<br />\n";
}
?>

<?php
/* foreach example 1: value only */

$a = array(1, 2, 3, 17);

foreach ($a as $v) {
    echo "Current value of \$a: $v.\n <br>";
}

/* foreach example 2: value (with its manual access notation printed for illustration) */

$a = array(1, 2, 3, 17);

$i = 0; /* for illustrative purposes only */

foreach ($a as $v) {
    echo "\$a[$i] => $v.\n  <br>";
    $i++;
}

/* foreach example 3: key and value */

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}

/* foreach example 4: multi-dimensional arrays */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}

/* foreach example 5: dynamic arrays */

foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}
?>

