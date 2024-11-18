
<?php
session_start();
if (($_SESSION['userid'] == '') || ($_SESSION['usertype'] <> '0'))
{
	die('<script language="javascript">top.location.href="loginexit.php"</script>');
}

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

//error_reporting(E_ALL);

$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con);
mysql_query("set names gb2312 ");

date_default_timezone_set("Asia/Shanghai");
$ordercode= date("ymdhis",time());

//echo $ordercode; die();

$checkedproduct = $_POST['checkedproduct'];
//echo $checkedproduct; die();

$address= $_POST['address'];
//$purchasearray=explode(',',$checkedproduct,1000000);

$SQL = "call sp_addorder('".$ordercode."','".$_SESSION['userid']."','".$address."','". $checkedproduct."')";
//echo $SQL; die();
if (mysql_query($SQL, $con)==false)  var_dump(mysql_error());

/*
$SQL = 'insert into t_order(ordercode,productcode,price,productimage,purchasenumber) values';
//print_r($purchasearray);
for ($i=0; $i<count($purchasearray)/2;$i++)
{
	if ($i<count($purchasearray)/2-1) 
		$SQL = $SQL."('". $ordercode. "','". $purchasearray[$i*2]."',(select price from t_product where productcode= '".$purchasearray[$i*2]."'),(select productimage from t_product where productcode='".$purchasearray[$i*2]."'),". $purchasearray[$i*2+1]."),";
	else if ($i=count($purchasearray)/2-1) 
		$SQL = $SQL."('". $ordercode. "','". $purchasearray[$i*2]."',(select price from t_product where productcode= '".$purchasearray[$i*2]."'),(select productimage from t_product where productcode='".$purchasearray[$i*2]."'),". $purchasearray[$i*2+1].");";
}

//echo $SQL; die();
if (mysql_query($SQL, $con)==false)  var_dump(mysql_error());
*/
$SQL1 = "select ordercode,productcode,price,purchasenumber,productimage,address from t_order0, t_orderdetail ";
$SQL1 = $SQL1. " where t_order0.orderid=t_orderdetail.orderid and ispay='0' and userid='". $_SESSION['userid'] ."' and ordercode= '".  $ordercode ."'";
//echo $SQL1; die();
$RS0 = mysql_query($SQL1, $con);

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
<form id=form1 name=form1 method=post action=addorder.php>
	<input type=submit value='付款'>
	配送地址：<?php echo $address?>
</form>
<p></p>
<center>
<table  ID="SrhTable" border=0 width=100% cellpadding=0 cellspacing=1>
<tr>

<td>订单编码</td>
<td>商品编码</td>
<td>商品价格</td>
<td>采购数量</td>
<td>商品图片</td>
</tr>

<?php
while($RS = mysql_fetch_array($RS0))
{
?>
<tr>

<td><?php echo strval($RS["ordercode"])?></td>
<td><?php echo strval($RS["productcode"])?></td>
<td><?php echo strval($RS["price"])?></td>
<td><?php echo strval($RS["purchasenumber"])?></td>
<td><?php echo "<img src=" . strval($RS["productimage"]).">"?></td></tr>

<?php 
}
mysql_close($con);
$RS=NULL;
$Con =NULL;
?>

</table>

</html>
