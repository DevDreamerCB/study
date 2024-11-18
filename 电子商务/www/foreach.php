<?php
/*
foreach foreach 语句用于循环遍历数组。
每进行一次循环，当前数组元素的值就会被赋值给 value 变量
（数组指针会逐一地移动） - 以此类推。
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
从PHP 5开始，你可以通过在变量前面使用&操作符来修改数组的元素，
这样的话分配的是引用，而不是值。
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
//list($key,$value) 和each()一起使用是将数组当前指针所指向单元的键/值对分别赋值给变量
while((list($key,$value)=each($language))){
 echo $key."=>".$value;
 echo "<br>";
}
?>


<?php
$arr = array("Apple", "Banana", "Orange");
//reset() 函数把数组的内部指针指向第一个元素，并返回这个元素的值。 若失败，则返回 FALSE。
reset($arr);
//each()会将作用的数组的当前单元的健/值对返回，并且将数组指针向下移动一个位
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
在老版本的PHP中list()是和each()一起用来遍历数组的，
但是在现在流行PHP5中已经被foreach($array as $key=>$value)给代替，
所以list()可以说已经没有什么作用。
但是你试图将数组的前面几个元素的值赋给list()括号中所列的变量时还是有点用的
*/
?>




<?php
//Program List：更多foreach的使用例子
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

