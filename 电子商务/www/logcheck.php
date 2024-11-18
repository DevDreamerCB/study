
<?php 
  global $c;
  $c = 0;
//isset() 函数用于检测变量是否已设置并且非 NULL。
if ( isset($_POST["action"]) && $_POST["action"] == "login"){
	// 处理登录的代码
	$user=$_POST["username"];
	$pwd =$_POST["password"];
  $para=$_GET["para"];
   
	// 记录用户id和password
	session_start();
	$_SESSION["USERID"]   = strtoupper($user); 
	$_SESSION["USERPSW"] = $pwd;

	echo $_SESSION["USERID"] . $para . " logged in. Your are welcome. ";
	echo '<form name="fmlog" method="post">';
	echo '<input type="hidden" name="action" value="logout" >';
	echo '<input type="submit" value="注销">';
	echo '</form>';
	
print <<<EOT
{$_SESSION["USERID"]} logged in. Your are welcome. 
<form name="fmlog" method="post">
<input type="hidden" name="action" value="logout" >
<input type="submit" value="注销">
</form>
EOT;
}
?>