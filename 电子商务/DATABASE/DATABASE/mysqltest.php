<html>
<head>
<script src="clienthint.js?abmcjd=g2eeiiie666ff"></script> 
</head>

<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con);
mysql_query("set names gb2312 ");

$str=$_POST["str"]; 
if ($str<>'')
{
$SQL = "delete from php_admin where userid in ($str)";
//echo $SQL; die();
mysql_query($SQL);
}

$userid=$_POST["userid"]; $upassword=$_POST["upassword"]; $username=$_POST["username"];
$userage=$_POST["userage"]; $usermobile=$_POST["usermobile"]; $useremail=$_POST["useremail"];

$SQL ="select count(*) from php_admin where userid='$userid'";
$RS0 = mysql_query($SQL);
$RS = mysql_fetch_array($RS0);
if ($RS[0]>=1)
{
	echo "用户ID重复，请重新输入!";
	die();
}

$SQL = "insert into php_admin(userid,password,username,userage,usermobile,useremail)";
$SQL = $SQL . " values('$userid','$upassword','$username',$userage,'$usermobile','$useremail')";
$RS0 = mysql_query($SQL);


$SQL = "select * from php_admin";
$RS0 = mysql_query($SQL);
?>


<script language = javascript>
<!--
	function efg()
	{
		var str=document.form1.usermobile.value;
		var str2=document.form1.useremail.value;
		var myreg=/^[1][3,4,5,7,8,9][0-9]{9}$/;
		var reg=new RegExp(/^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/);
		if (!myreg.test(str)) {
		    alert("请填写正确的手机号码");
		    document.form1.usermobile.focus();
		    return false;
		} 	
		if (!reg.test(str2)) {
		    alert("请填写正确的邮箱地址");
		    document.form1.useremail.focus();
		    return false;
		}
		showHint(document.form1.userid.value);

	  //document.form1.submit();
	}
	
function abc(s) {
form1.str.value=s;
alert(form1.str.value);
form1.submit();
}

	function edf()
	{
		var checkboxes; 
		var i;
	  //var str = []; 
	  var str='';
	    checkboxes = document.getElementsByName("checkbox0");
	    for(i=0;i<checkboxes.length;i++){ 
	        if(checkboxes[i].checked){ 
	            //str.push(checkboxes[i].value); 
	            str = str + '\'' + checkboxes[i].value +'\',';
	        } 
	     } 
	  document.form1.str.value=str.substring(0,str.length-1);

	  alert(document.form1.str.value);
		document.form1.submit();
	}
//-->
</script>


<form id=form1 name=form1 method=post>
<table>
<tr><td>用户ID:</td><td><input type=text id=userid name=userid></td></tr>
<tr><td>密码:</td><td><input type=password id=upassword name=upassword></td></tr>
<tr><td>用户姓名:</td><td><input type=text id=username name=username></td></tr>
<tr><td>用户年龄:</td><td><input type=text id=userage name=userage></td></tr>
<tr><td>手机号:</td><td><input type=text id=usermobile name=usermobile></td></tr>
<tr><td>EMAIL:</td><td><input type=text id=useremail name=useremail></td></tr>
</table>

	
<TABLE border=1>

<input type=hidden name=str>
<?php
while($RS = mysql_fetch_array($RS0))
{
?>
<tr>
<td><input type=checkbox name=checkbox0 value='<?php echo $RS["userid"]?>'></td>
<td align=left>&nbsp;<?php echo $RS["userid"]?></td>
<td align=left>&nbsp;<?php echo $RS["usertype"]?></td>
<td align=left>&nbsp;<?php echo $RS["password"]?></td>
<td align=left>&nbsp;<?php echo $RS["username"]?></td>
<td align=left>&nbsp;<?php echo $RS["userage"]?></td>
<td align=left>&nbsp;<?php echo $RS["usermobile"]?></td>
<td align=left>&nbsp;<?php echo $RS["useremail"]?></td>
<td> <input type=button value=删除 onclick="abc('<?php echo $RS["userid"]; ?>')"> </td>

</tr>
<?php
}
?>

</table>

<input type=button value=删除 onclick="edf()">
<input type=button value="保存" onclick="return efg();">
</form>


<?php
mysql_close($con);
?>
</html>