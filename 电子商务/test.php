<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con); 
mysql_query("set names gb2312 ");

$sql1 = "select userid,username,password from php_admin";
//die($sql1);
$RS0 = mysql_query($sql1);
?>
<TABLE border=1>
<CAPTION align=center>�û���Ϣ��</CAPTION>
<TR><TH>�û�id</TH> <TH>����</TH> <TH>����</TH></TR>	

<?php
while($RS = mysql_fetch_array($RS0))
{
?>
<TR>
<TD><?php echo $RS["userid"] ?> </TD>
<TD><?php echo $RS["username"] ?> </TD>
<TD><?php echo $RS["password"] ?> </TD>	
</TR>
<?php
}
mysql_close($con);

?>
</TABLE>
