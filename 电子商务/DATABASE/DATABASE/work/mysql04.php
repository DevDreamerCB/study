<?php
$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con);
mysql_query("set names gb2312");
$SQL = "select userid,username,password from php_admin";
$RS0 = mysql_query($SQL);
?>
<table>
<?php
while($RS = mysql_fetch_array($RS0))
{
?>
<tr>
<td><input type=checkbox value=<?php echo $RS["userid"]?>></td>
<td><?php echo $RS["userid"]?></td>
<td><?php echo $RS["username"]?></td>
<td><?php echo $RS["password"]?></td>
</tr>
<?php
}
?>
</table>
<input type=button onclick="return a()">
<?php
mysql_close($con)
?>

