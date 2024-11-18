<?php
//filename:upldfile.php
if($_POST["ifupload"]=="1") {
  $path=AddSlashes(dirname(__FILE__))."\\\\upload\\\\";
  for($i=1;$i<=8;$i++) {
     	$files="afile$i";     
	if (is_uploaded_file($_FILES[$files]['tmp_name'])) {
  		$filename = $_FILES[$files]['name'];
		$localfile = $path.$filename;
		//echo $localfile; die();
		move_uploaded_file($_FILES[$files]['tmp_name'], $localfile);
	}
   }
   echo "<br><b>You have uploaded files successfully</b><br>";

}
?>