<html>
<head>
<script src="selectuser.js"></script>
</head>
<body>

<form> 
请选择一个用户:
<select name="users" onchange="showUser(this.value)">
<?php

$Conn = new COM("ADODB.Connection");

$MM_Conn_STRING = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" . realpath("userdb.mdb");

$Conn->Open($MM_Conn_STRING);

$RS =new COM("ADODB.RecordSet");//数据集

$SQL = "select id,name,age,hometown,job from t_user order by id";

$RS->open($SQL,$Conn,1,3);//执行语句,返回记录集

$i=1;
while ((!($RS->EOF)) && (!($RS->BOF)))
{
  echo "<option value=\"$i\">".strval($RS->fields["name"])."</option>";
  $RS->MoveNext();
  $i++;
}
?>
</select>
</form>

<p>
<div id="txtHint"><b>此处列出用户信息.</b></div>
</p>

</body>
</html>