<?php
/*
当查询从 JavaScript 送达 PHP 页面时，会发生：

PHP 文档的 content-type 被设置为 "text/xml" 
PHP 文档被设置为 "no-cache"，以防止缓存 
用 HTML 页面送来的数据设置 $q 变量 
PHP 打开与 数据库的连接 
找到带有指定 id 的 "user" 
以 XML 文档输出数据 
*/

header('Content-Type:text/xml;charset=GB2312');
header("Cache-Control: no-cache, must-revalidate");
//A date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

$q=$_GET["q"];

$Conn = new COM("ADODB.Connection");

$MM_Conn_STRING = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" . realpath("userdb.mdb");

$Conn->Open($MM_Conn_STRING);

$RS =new COM("ADODB.RecordSet");//数据集

$SQL = "select id,name,age,hometown,job from t_user";
$SQL = $SQL . " where id =   '".$q."'";
//echo $SQL;

$RS->open($SQL,$Conn,1,3);//执行语句,返回记录集

echo '<?xml version="1.0" encoding="gb2312"?>
<CATALOG>
<PERSON>';

while ((!($RS->EOF)) && (!($RS->BOF)))
{
  echo "<ID>" . strval($RS->fields["id"]) . "</ID>\n" ;
  echo "<NAME>" . strval($RS->fields["name"]) . "</NAME>\n";
  echo "<AGE>" . strval($RS->fields["age"]) . "</AGE>\n";
  echo "<HOMETOWN>" . strval($RS->fields["hometown"]) . "</HOMETOWN>\n";
  echo "<JOB>" . strval($RS->fields["job"]) . "</JOB>\n";
  $RS->MoveNext();
}

echo '</PERSON>
</CATALOG>
';

$Conn->Close();
$RS=NULL;
$Conn =NULL;
?>
