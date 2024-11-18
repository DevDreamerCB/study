<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con);
mysql_query("set names gb2312 ");

$SQL = "select userid,username,password from php_admin";
$RS0 = mysql_query($SQL);
echo "<table border=1>";
while($RS = mysql_fetch_array($RS0))
{
echo "<tr>";	
echo "<td>".$RS["userid"]."</td>";
echo "<td>".$RS["username"]."</td>";
echo "<td>".$RS["password"]."</td>";
echo "</tr>";
}
echo "</table>";
mysql_close($con);
?>