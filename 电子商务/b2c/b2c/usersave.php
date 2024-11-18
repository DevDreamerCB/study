
<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$userid = $_POST['userid'];
$username = $_POST['username'];
$password = $_POST['password'];

$con = mysql_connect("localhost","root","sql");
mysql_select_db("qingzhou", $con);
mysql_query("set names gb2312 ");

$SQL = "insert into php_admin(userid,username,password) values(";
$SQL = $SQL . "'". $userid ."','".  $username ."','";
$SQL = $SQL . $password ."')";

mysql_query($SQL, $con);

//echo $SQL; die();  

$SQL = "select * from php_admin where userid='".$userid."'";
//$SQL = "select userid,username,password from php_admin";

//echo $sql1; die();
$RS0 = mysql_query($SQL, $con);
//print_r(mysql_fetch_array($RS0));
?>

<HTML>
<HEAD>
<style type="text/css">
<!--
font{font-family: "宋体";font-size:9pt}
.font1{font-family: "宋体";font-size:14.3px}
td{font-family: "宋体";font-size:9pt}
a{text-decoration:none}
-->
</style>

</HEAD>
<TITLE>用户管理示例（教学用）</TITLE>

<BODY>
<form id=form1 name=form1 method=post>
<center>
<table  ID="SrhTable" border=0 width=100% cellpadding=0 cellspacing=1>


<?php

while($RS = mysql_fetch_array($RS0))
{
?>
<tr><td><?php echo strval($RS["userid"])?></td>
<td><?php echo strval($RS["username"])?></td>
<td><?php echo strval($RS["password"])?></td></tr>
<?php 
}
mysql_close($con);
$RS=NULL;
$Con =NULL;
?>

</table>


</html>
