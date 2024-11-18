<?php

/*
require_once()和include()语句分别对应于require()和include()语句。
require_once()和include()语句主要用于需要包含多个文件时，可以有效避免把同一段代码包含进去
而出现函数或者变量重复定义的错误。
*/

require("fool.inc");
require("util.inc"); // 此句会产生一个错误
$foo = array ("1", array("complex", "quaternion"));
echo "this is requiring util.inc again which is also <br>\n";
echo "required in fool.inc\n";
echo "Running goodTea:". goodTea(). "<br>\n";
echo "Printing foo:<br>\n";
showVar($foo);
?>