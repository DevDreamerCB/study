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

 echo $path;
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
  		$src_type = $_FILES[$files]['type']; 
  		$src_type = explode('/',$src_type)[count($src_type)];
  		
			$localfile = $path . $filename;
			$localfilesmall = $path . "s". $filename;//小图路径
			echo $localfile;
		 
			$src_fnc = 'imagecreatefrom'.$src_type ;//创建图像资源函数 对应函数 imagecreatefrompng 或者 imagecreatefromjpeg 
			$src_image = $src_fnc($_FILES[$files]['tmp_name']);//临时图片资源
			$src_w = imagesx($src_image);//上传图片的宽
			$src_h = imagesy($src_image);//高
			if (src_w > 600)
			{
				$dst_w = 300;//固定300，
				$dst_h = floor((300.0/$src_w)*$src_h);//同样的比例缩放  
			}
			else
			{
				$dst_w = floor($src_w/3);//这里 目标图片的宽是源图片的三分之一，
				$dst_h = floor($src_h/3);//同样的  				
			}
			$dst_image = imagecreatetruecolor($dst_w, $dst_h);//此时的画布为原来图片的 1/3或比例分之一
			imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
			
			$out_fnc = 'image'.$src_type; //imagepng   imagejpeg
			if( !($out_fnc($dst_image ,$localfilesmall) && file_exists($localfilesmall))){
			    //缩略图保存成功了，文件路径就是$path
			} else{
			    //保存失败了，检查错误
			}
			
		//move_uploaded_file() 函数将上传的文件移动到新位置。
		 
	   move_uploaded_file($_FILES[$files]['tmp_name'], $localfile);
   	}
   	
//   } 	
   }
   echo "<br><b>You have uploaded files successfully</b><br>";
   exit;	

}
?>
