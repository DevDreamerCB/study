<?php
/*
���ݿ����ƣ� qingzhou
������php_admin
�ֶΣ�
user_id
password
username

*/
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$scriptname = split('[/]',$_SERVER['SCRIPT_NAME']);
$PageName = end($scriptname);//�õ���ҳ����
$PageAdd="sqlserveruserAdd.php";

$currentpage=$_GET["currentpage"];

//$conn = @new COM("ADODB.Connection") or die ("ADO����ʧ��!");
$Conn = new COM("ADODB.Connection");

$MM_Conn_STRING = "provider=sqloledb;datasource=.;uid=sa;pwd=sql;database=phpdb;";

$Conn->Open($MM_Conn_STRING);

$RS =new COM("ADODB.RecordSet");//���ݼ�

//ɾ����¼
if ($_REQUEST["delyn"] == "1") {
	$userid = $_REQUEST["radio1"];
	$userid = substr($userid,0,strlen($userid)-1);
	$SQL = "delete from php_admin where userid in(" . strval($userid) . ")";
	$Conn->Errors->Clear;
	//$Conn->BeginTrans; //ACCESS���ݿⲻ֧��������������
	$Conn->Execute($SQL);
	if (($conn->Errors->Count)>0) {
	//	$conn->RollbackTrans;
		$flag = "Z";
	}
	else
	{
	//	$conn->CommitTrans;
		$flag = "A";
	}
}	

//$selname = trim(str_ireplace($_REQUEST["selname"],"'","''"));
$selname = trim(($_REQUEST["selname"]));
$SQL = "select userid,username,password from php_admin";
$SQL = $SQL . " where username like '%" . $selname . "%'";
$SQL = $SQL . " order by userid";

$RS->open($SQL,$Conn,1,3);//ִ�����,���ؼ�¼��

$pagesize=$RS->Pagesize=5;//����ÿҳ��ʾ����
$totalpage=$RS->PageCount;
$recount=$RS->RecordCount;
if ($currentpage=="") { 
	$currentpage=1;
}
else
{
	if (intval($currentpage)>intval($totalpage)){ 
		$currentpage=intval($totalpage);
	}
	if (intval($currentpage<1)) { 
		$currentpage=1;
	}
}
$count = $RS->RecordCount - (intval($currentpage)-1)*5;
if ($count > 5) {$count=5;}

if (!$RS->EOF) {
	$RS->AbsolutePage=intval($currentpage);
}
?>

<HTML>
<HEAD>
<style type="text/css">
<!--
font{font-family: "����";font-size:9pt}
.font1{font-family: "����";font-size:14.3px}
td{font-family: "����";font-size:9pt}
a{text-decoration:none}
-->
</style>

<SCRIPT LANGUAGE=javascript>
<!--
  
function btndel_onclick() {
<?php 
switch ($count) {
	case 0: 
	break; ?>
	alert("û�п�ѡ����û���");
	return false;
<?php
  default:
  for ($i=0; $i<=($count-1); $i++) { ?>
			if(document.form1.checkbox<?php echo strval($i)?>.checked==false){
 			<?php if ($i==$count-1) {?>
				alert("����ѡ���û���");
				return false;
			<?php }?>	
<?php }?>			
<?php
  for ($i=0; $i<=($count-1); $i++) {?>
			}
<?php }?>	
<?php }?>	
if(!confirm("��ȷ��Ҫɾ��ѡ�е��û���")) return false;
j=0;
delstr="";
<?php if ($count> 0) {
     for ($i=0; $i<=$count-1; $i++) {?>
         if (document.form1.checkbox<?php echo strval($i)?>.checked==true){
            j++;
            delstr=delstr + "'" + document.form1.u<?php echo strval($i)?>.value + "',"
         }
			<?php }?>			
      document.form1.radio1.value=delstr;
<?php }?>			
document.form1.delyn.value="1";
document.form1.submit();
}

function selall(){
<?php
switch ($count) {
	case 0: 
	break; ?>
	alert("û�п�ѡ����û���");
<?php
  default:
  for ($i=0; $i<=($count-1); $i++) { ?>
			document.form1.checkbox<?php echo strval($i)?>.checked=true;
			<?php }?>			
<?php }?>			
}			

function selnone(){
<?php
switch ($count) {
	case 0: 
	break; ?>
	alert("û�п�ѡ����û���");
<?php
  default:
  for ($i=0; $i<=($count-1); $i++) { ?>
			document.form1.checkbox<?php echo strval($i)?>.checked=false;
			<?php }?>			
<?php }?>			
}			

function btnadd_onclick() {
window.location="<?php echo strval($PageAdd)?>";
}

function btnmdf_onclick(userid) {
	document.form1.action = "<?php echo strval($PageAdd)?>?btn_update=y&currentpage=<?php echo strval($currentpage)?>&selname=<?php echo strval($selname)?>&isMDF=1&userid="+userid;
	document.form1.submit();
}

function window_onload() {
	flag="<?php echo strval($flag)?>";
	if(flag!=""){
		if(flag=="A"){
			alert("ѡ�е��û���¼ɾ���ɹ���");
		}
		else{
			alert("ѡ�е��û���¼ɾ��ʧ�ܣ�");
		}
	}
}

function btnsel_onclick() {
	if (onsubmitcheck(document.form1)==true)	//���˫����
	   document.form1.submit();
}

function URLStr(){
	return "<?php echo strval($PageName) ?>?selname=<?php echo strval($selname)?>";
}

function goPage(){
	var vtf = true;
	if(document.form1.goPageNo.value == ""){
		alert("������Ҫ��ת��ҳ�룡");
		document.form1.goPageNo.focus();
		vtf = false;
	}
	if(isNaN(document.form1.goPageNo.value)){
		alert("Ҫ��ת��ҳ�����Ϊ���֣�");
		document.form1.goPageNo.select();
		vtf = false;
	}
	if(vtf) Overturn(document.form1.goPageNo.value);
}

function Overturn(p){
	var Str = URLStr();
	window.location=Str + "&currentpage=" + p;
}

function view(newsfile) {
	var popup2 = null;
	popup2 = window.open('', '_blank', 'status=0,menubar=0,location=0,toolbar=0,width=350,height=240,left=0,top=0,scrollbars=0');
	popup2.location.href = newsfile;
}

function onsubmitcheck(form){
	var n=0;
	for(n=0;n<form.length;n++)
	{
		if (form.elements[n].type=="text"||form.elements[n].type=="textarea")
		{
			if (form.elements[n].value.indexOf("\"")>=0)
			{
			alert(form.elements[n].title+"��д�����в�����˫���ţ���");//form.elements[n].title+
			form.elements[n].focus();
			return false;
			};
		};
	};
	return true;
}
//-->
</SCRIPT>
</HEAD>
<TITLE>�û�����ʾ������ѧ�ã�</TITLE>

<BODY LANGUAGE=javascript onload="return window_onload()">
<form id=form1 name=form1 action="<?php echo $PageName;?>" method=post>
<center><table border=0 width=100% cellpadding=0 cellspacing=1>
<tr height="25">
<td colspan=6 align=center><font class=font1 color=red>�û�����</td>
</tr>
<tr>
<td height="18" colspan=6 align=right>
<INPUT type="button" id=btnadd name=btnadd value="[ �� �� ]" class="txtbox" LANGUAGE=javascript style="BACKGROUND-COLOR: white; BACKGROUND-REPEAT: no-repeat; CURSOR: hand;Border:0;font-size:9pt;color:red;" onclick="return btnadd_onclick()">
<INPUT type="button" id=btndel name=btndel value="[ ɾ �� ]" class="txtbox" LANGUAGE=javascript style="BACKGROUND-COLOR: white; BACKGROUND-REPEAT: no-repeat; CURSOR: hand;Border:0;font-size:9pt;color:red;" onclick="return btndel_onclick()">
<input type="hidden" id=delyn name=delyn value="0">
<input type="hidden" id=currentpage name=currentpage value="<?php $currentpage?>">

<script>
<!--
function dispadd() {
	if (document.layers) {
		if (document.layers['addguest'].visibility == "show") {
			document.layers['addguest'].visibility="hide";
		} else {
			document.layers['addguest'].visibility="show";
		}
	}

	if (document.all) {
		if (document.all.addguest.style.visibility =="visible") {
			document.all.addguest.style.visibility="hidden";
		} else {
			document.all.addguest.style.visibility="visible";
		}
	}
}
if (document.layers) {
document.write("<layer name='addguest' left='0' top='120' visibility='hide' align='center'>");
}
if (document.all) {
document.write("<div ID='addguest' style='text-align: center; position:absolute; overflow:none; left:254px; top:61px; visibility:hidden; z-index:10'>");
}
//-->
</script>

<table cellspacing=1 bgcolor=#FFCB7D cellpadding=4 border=0 width=300>
<tr bgcolor=#FFD070>
<td align=center width=96%>-��������������-</td>
<td align=right width=12><input type="button" onclick="dispadd();" value="�w" style="width:-10; height: 12; vertical-align: top; font-size:4pt "></td>
</tr>
<tr>
<td width=100% colspan=2 bgcolor=#FFF4C8 align=center>
<table>
<tr>
<td>��&nbsp;��<INPUT type="text" id=selname name=selname value="<?php echo $selname?>" size=12 maxlength=10 style=font-size:9pt>&nbsp;&nbsp;&nbsp;<input type=button value='����' style="font-size: 9pt" id=btnsel name=btnsel LANGUAGE=javascript onclick="return btnsel_onclick()"></td>
</tr>
</table>
<span style="line-height: 3pt">&nbsp</span><br>
</tr>
</table>

<script><!--
if (document.layers) {
document.write("</layer>");
}
if (document.all) {
document.write("</div>");
}
//-->
</script>

<INPUT type="button" id=btnsel name=btnsel value="[ �� �� ]" class="txtbox" LANGUAGE=javascript style="BACKGROUND-COLOR: white; BACKGROUND-REPEAT: no-repeat; CURSOR: hand;Border:0;font-size:9pt;color:red;" onclick="return dispadd()">
</td>
</tr>

<tr align=center bgcolor=#006699  height=22>
<td width=15%>��</td>
<td width=15%><font color=white>�û�ID</td>
<td width=50%><font color=white>�û�����</td>
<td width=20%><font color=white>�û�����</td>
</tr>

<?php
$i=0;
$color="0";

while ((!($RS->EOF)) && (!($RS->BOF))&& ($i<$pagesize))
{
?>
<tr height=22 align=center <?php if ($color=="1") {echo "bgcolor=#FFF5DD" ;}?>>
<td><input type="checkbox" id=checkbox<?php echo strval($i);?> name=checkbox<?php echo strval($i);?>></td>
<td align=left>&nbsp;<?php echo $RS->fields["userid"]?></td>  
<td align=left>&nbsp;
<a href='javascript:btnmdf_onclick("<?php echo $RS->fields["userid"]?>")' title="����޸� ��<?php echo $RS->fields["userid"]?>��">
<?php echo strval($RS->fields["username"])?>
</a><input type=hidden id="u<?php echo strval($i);?>" name="u<?php echo strval($i);?>" value="<?php echo $RS->fields["userid"]?>">
</td>
<td align=left><?php echo strval($RS->fields["password"])?></td>
</tr>
<tr>
<td bgcolor="Black" colspan=6 height=1><img src="../img/empty.gif" width=1 height=1 border=0></td>
</tr>
<?php
  if ($color=="0") {
	  $color="1";
  }
  else 
  {    
  	$color="0";
  }
  $RS->MoveNext();
  $i=$i+1;
}
?>

<input type=hidden id=radio1 name=radio1 value="">
</table>
<table width=100% border=0 cellpadding=0 cellspacing=0>
<tr>
<td height=30>|
	<?php if (($currentpage=="1") || ($totalpage==0)){?><font color=Silver> �� ҳ </font><?php }else {?><a href="javascript:Overturn('1');"><font color=#006699> �� ҳ </font></a><?php }?>
   |<?php if (($currentpage=="1") || ($totalpage==0)){?><font color=Silver> �� ҳ </font><?php }else {?><a href="javascript:Overturn('<?php echo strval(intval($currentpage)-1) ?>');"><font color=#006699> �� ҳ </font></a><?php }?>
   |<?php if ((intval($currentpage)==intval($totalpage)) || ($totalpage==0)){?><font color=Silver> �� ҳ </font><?php }else {?><a href="javascript:Overturn('<?php echo strval(intval($currentpage)+1) ?>');"><font color=#006699> �� ҳ </font></a><?php }?>
   |<?php if ((intval($currentpage)==intval($totalpage)) || ($totalpage==0)){?><font color=Silver> ĩ ҳ </font><?php }else {?><a href="javascript:Overturn('<?php echo strval($totalpage) ?>');"><font color=#006699> ĩ ҳ </font></a><?php }?>
   |<a href="javascript:selall();"><font color=#006699> ȫ ѡ </font></a>|<a href="javascript:selnone();"><font color=#006699> ȫ��ѡ </font></a>
   |<A HREF="javascript:goPage();">��ת</A> ��<INPUT TYPE="text" NAME="goPageNo" size=2 maxlength=6>ҳ</td>
<td align=right>��<font color=red><?php echo $recount?></font>����¼&nbsp;&nbsp;&nbsp;&nbsp;��<font color=red><?php echo $currentpage?></font>ҳ/��<font color=red><?php echo $totalpage?></font>ҳ</td>
</tr>
</table>

<?php
$Conn->Close();
$RS=NULL;
$Conn =NULL;
?>