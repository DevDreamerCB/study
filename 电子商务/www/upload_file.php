<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

//filename:upldfile.php

if($_POST["ifupload"]=="1") {
/*
addslashes() ������ָ����Ԥ�����ַ�ǰ��ӷ�б�ܡ�
��ЩԤ�����ַ��ǣ�
������ (') 
˫���� (") 
��б�� (\) 
NULL 
*/
//�ڳ����У���ʱ���ǻῴ��������·��д����"D:\\Driver\\Lan" Ҳ����������б�����ָ�·����
  $path=AddSlashes(dirname(__FILE__))  . "\\\\upload\\\\";
//echo AddSlashes(dirname(__FILE__)); die();
 echo $path;//die();
  for($i=1;$i<=2;$i++) {
     	$files="afile$i"; 
     	echo $files. " Kb<br />";
//�û�ֻ���ϴ�pdf�ļ����ļ���С������� 20 kb��
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
ͨ��ʹ�� PHP ��ȫ������ $_FILES������Դӿͻ��������Զ�̷������ϴ��ļ���

��һ�������Ǳ��� input name��
�ڶ����±������ "name", "type", "size", "tmp_name" �� "error"������������

$_FILES["file"]["name"] - ���ϴ��ļ������� 
$_FILES["file"]["type"] - ���ϴ��ļ������� 
$_FILES["file"]["size"] - ���ϴ��ļ��Ĵ�С�����ֽڼ� 
$_FILES["file"]["tmp_name"] - �洢�ڷ��������ļ�����ʱ���������� 
$_FILES["file"]["error"] - ���ļ��ϴ����µĴ������ 
*/     	
echo $_FILES[$files]['tmp_name'];
 //is_uploaded_file() �����ж�ָ�����ļ��Ƿ���ͨ�� HTTP POST �ϴ���    	
	if (is_uploaded_file($_FILES[$files]['tmp_name'])) {
  		$filename = $_FILES[$files]['name'];
		$localfile = $path . $filename;
		echo $localfile; 
		//move_uploaded_file() �������ϴ����ļ��ƶ�����λ�á�
		 move_uploaded_file($_FILES[$files]['tmp_name'], $localfile);
   	}
   	
//   } 	
   }
   echo "<br><b>You have uploaded files successfully</b><br>";
   exit;	

}
?>
