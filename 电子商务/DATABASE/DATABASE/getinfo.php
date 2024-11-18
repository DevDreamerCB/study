<?php  $con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con); mysql_query("set names gb2312 ");
$text = "";
$userid=$_GET["userid"];
$usermobile=$_GET["usermobile"]; 
$useremail=$_GET["useremail"]; 

$SQL = "select count(*) from php_admin where userid='".$userid."'";
//echo $SQL ; die(); 
$RS0 = mysql_query($SQL); 

$RS = mysql_fetch_array($RS0);
//echo $RS[0]; die();
if ($RS[0]==1) {
	$text = "userid;userid重复，请重新输入！";
};

$SQL = "select count(*) from php_admin where usermobile='".$usermobile."'";
//echo $SQL ; die(); 
$RS0 = mysql_query($SQL); 

$RS = mysql_fetch_array($RS0);
//echo $RS[0]; die();
if ($RS[0]==1) {
	$text = "usermobile;usermobile重复，请重新输入！";
};


$SQL = "select count(*) from php_admin where useremail='".$useremail."'";
//echo $SQL ; die(); 
$RS0 = mysql_query($SQL); 

$RS = mysql_fetch_array($RS0);
//echo $RS[0]; die();
if ($RS[0]==1) {
	$text = "useremail;useremail重复，请重新输入！";
};

mysql_close($con); $RS=NULL; $Con =NULL;
echo $text;
?>
