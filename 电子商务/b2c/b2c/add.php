<?php
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");
session_start();
$name = NULL;
if($_POST['ifupload'] == "1")
{
    $path=AddSlashes(dirname(__FILE__))  . "\\\\images2\\\\";
    echo $path;
    for($i=1;$i<=1;$i++) {
          	$files="afile$i";
          	echo $files. " Kb<br />";

     		if ($_FILES[$files]["error"] > 0)
       		{
       			echo "Error: " . $_FILES[$files]["error"] . "<br />";
       		}
     		else
      		 {
      		    $namess = $_FILES[$files]["name"];
       			echo "Upload: " . $_FILES[$files]["name"] . "<br />";
       			echo "Type: " . $_FILES[$files]["type"] . "<br />";
      			 echo "Size: " . ($_FILES[$files]["size"] / 1024) . " Kb<br />";
       			echo "Stored in: " . $_FILES[$files]["tmp_name"] . " Kb<br />";
       		}

     echo $_FILES[$files]['tmp_name'];
     	if (is_uploaded_file($_FILES[$files]['tmp_name'])) {
       		$filename = $_FILES[$files]['name'];
     		$localfile = $path . $filename;
     		echo $localfile;
     		 move_uploaded_file($_FILES[$files]['tmp_name'], $localfile);
        	}
        	 echo "<br><b>You have uploaded files successfully</b><br>";
    }
}
if($_SESSION['userid'] != "" && $_SESSION['usertype'] == "1")
{
    $con = mysql_connect("localhost","root","password");
    mysql_select_db("qingzhou", $con);
    mysql_query("set names gb2312");
    $path=AddSlashes(dirname(__FILE__))  . "\\\\images2\\\\";

    $sql1 = "insert into t_product (productname,sellercode,price,productimage) values('".$_POST['productname']."',"."'".$_SESSION['userid']."',"."'".$_POST['price']."',"."'"."images2\\".$namess."')";
    mysql_query($sql1,$con);
}
else
{
    die('<script language="javascript">top.location.href="loginexit.php"</script>');
}
echo $sql1;
?>