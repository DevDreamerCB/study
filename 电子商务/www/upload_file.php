<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

//filename:upldfile.php

if($_POST["ifupload"]=="1") {
/*
addslashes() 函数在指定的预定义字符前添加反斜杠。
这些预定义字符是：
单引号 (') 
双引号 (") 
反斜杠 (\) 
NULL 
*/
//在程序中，有时我们会看到这样的路径写法，"D:\\Driver\\Lan" 也就是两个反斜杠来分隔路径。
  $path=AddSlashes(dirname(__FILE__))  . "\\\\upload\\\\";
//echo AddSlashes(dirname(__FILE__)); die();
 echo $path;//die();
  for($i=1;$i<=2;$i++) {
     	$files="afile$i"; 
     	echo $files. " Kb<br />";
//用户只能上传pdf文件，文件大小必须大于 20 kb：
//if (($_FILES[$files]["type"] == "application/pdf")
//&& ($_FILES[$files]["size"] > 20000))
//{
		if ($_FILES[$files]["error"] > 0)
  		{
  			echo "Error: " . $_FILES[$files]["error"] . "<br />";
  		}
		else
 		{
  			echo "Upload: " . $_FILES[$files]["name"] . "<br />";
  			echo "Type: " . $_FILES[$files]["type"] . "<br />";
 			 echo "Size: " . ($_FILES[$files]["size"] / 1024) . " Kb<br />";
  			echo "Stored in: " . $_FILES[$files]["tmp_name"] . " Kb<br />";
  		}

/*
通过使用 PHP 的全局数组 $_FILES，你可以从客户计算机向远程服务器上传文件。

第一个参数是表单的 input name，
第二个下标可以是 "name", "type", "size", "tmp_name" 或 "error"。就像这样：

$_FILES["file"]["name"] - 被上传文件的名称 
$_FILES["file"]["type"] - 被上传文件的类型 
$_FILES["file"]["size"] - 被上传文件的大小，以字节计 
$_FILES["file"]["tmp_name"] - 存储在服务器的文件的临时副本的名称 
$_FILES["file"]["error"] - 由文件上传导致的错误代码 
*/     	
echo $_FILES[$files]['tmp_name'];
 //is_uploaded_file() 函数判断指定的文件是否是通过 HTTP POST 上传的    	
	if (is_uploaded_file($_FILES[$files]['tmp_name'])) {
  		$filename = $_FILES[$files]['name'];
		$localfile = $path . $filename;
		echo $localfile; 
		//move_uploaded_file() 函数将上传的文件移动到新位置。
		 move_uploaded_file($_FILES[$files]['tmp_name'], $localfile);
   	}
   	
//   } 	
   }
   echo "<br><b>You have uploaded files successfully</b><br>";
   exit;	

}
?>
