<?php
$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con); mysql_query("set names gb2312 ");
$q=$_GET["q"]; 

$SQL ="select count(*) from php_admin where userid='$q'";
$RS0 = mysql_query($SQL);
$RS = mysql_fetch_array($RS0);
if ($RS[0]>=1)
{
	echo "1";
}
else
{
	echo "0";
}
mysql_close($con); $RS=NULL; $Con =NULL;
?>