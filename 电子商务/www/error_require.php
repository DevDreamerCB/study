<?php

/*
require_once()��include()���ֱ��Ӧ��require()��include()��䡣
require_once()��include()�����Ҫ������Ҫ��������ļ�ʱ��������Ч�����ͬһ�δ��������ȥ
�����ֺ������߱����ظ�����Ĵ���
*/

require("fool.inc");
require("util.inc"); // �˾�����һ������
$foo = array ("1", array("complex", "quaternion"));
echo "this is requiring util.inc again which is also <br>\n";
echo "required in fool.inc\n";
echo "Running goodTea:". goodTea(). "<br>\n";
echo "Printing foo:<br>\n";
showVar($foo);
?>