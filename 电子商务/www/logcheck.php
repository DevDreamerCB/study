
<?php 
  global $c;
  $c = 0;
//isset() �������ڼ������Ƿ������ò��ҷ� NULL��
if ( isset($_POST["action"]) && $_POST["action"] == "login"){
	// �����¼�Ĵ���
	$user=$_POST["username"];
	$pwd =$_POST["password"];
  $para=$_GET["para"];
   
	// ��¼�û�id��password
	session_start();
	$_SESSION["USERID"]   = strtoupper($user); 
	$_SESSION["USERPSW"] = $pwd;

	echo $_SESSION["USERID"] . $para . " logged in. Your are welcome. ";
	echo '<form name="fmlog" method="post">';
	echo '<input type="hidden" name="action" value="logout" >';
	echo '<input type="submit" value="ע��">';
	echo '</form>';
	
print <<<EOT
{$_SESSION["USERID"]} logged in. Your are welcome. 
<form name="fmlog" method="post">
<input type="hidden" name="action" value="logout" >
<input type="submit" value="ע��">
</form>
EOT;
}
?>