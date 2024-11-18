<?php
/*
数据库名称： qingzhou
表名：php_admin
字段：
user_id
password
username

*/
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

//echo phpinfo(); die();

//echo $_SERVER['SCRIPT_NAME'];

//$scriptname = split('[/]',$_SERVER['SCRIPT_NAME']);
$scriptname = explode('[/]',$_SERVER['SCRIPT_NAME']);

$PageName = end($scriptname);//得到本页名称
$PageAdd="mysqluserAdd.php";

//$currentpage=$_GET["currentpage"];
$currentpage=$_REQUEST["currentpage"];
//echo $currentpage."test"."<br/>";

//$selname = trim(str_ireplace($_REQUEST["selname"],"'","''"));
$selname = trim(($_REQUEST["selname"]));

//$con = mysql_connect("localhost","root","sql");
//$con = sqlsrv_connect("ZJL-PC",array("UID"=>"sa", "PWD"=>"sql", "Database"=>"GWEDDB","CharacterSet" => "UTF-8")) or die('数据库连接失败！');; 

$serverName = "ZJL-PC";
$connectionInfo = array( "Database"=>"GWEDDB");
$con = sqlsrv_connect( $serverName, $connectionInfo);

if( $con )
{
     echo "Connection established.\n";
}
else
{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}



//mysql_select_db("qingzhou", $con);
//mysql_query("set names gb2312 ");

$SQL = "select * from dbo.t_accident_image";
$RS0 = sqlsrv_query($con,$SQL);

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

while($RS = sqlsrv_fetch_array($RS0,SQLSRV_FETCH_ASSOC))
{
?>

<tr height=22 align=center <?php if ($color=="1") {echo "bgcolor=#FFF5DD" ;}?>>
<td align=left>&nbsp;<?php echo "<img border='0' style=' max-height: 153px; min-height: 153px' src='mssqlimage.php?imageid=".$RS["image_id"]."'>"; ?>
	</td>  

</tr>
<?php

}

sqlsrv_close($con);
$RS=NULL;
$Conn =NULL;
?>
</table>