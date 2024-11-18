<?php 
header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$serverName = "ZJL-PC";
$connectionInfo = array( "Database"=>"paitedb");
$con = sqlsrv_connect( $serverName, $connectionInfo);

if( !$con )
{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}
 
// Ɛ¶Ρction 
$action = isset($_REQUEST['action'])? $_REQUEST['action'] : ''; 
 
// ʏ´«ͼƬ 
if($action=='add'){ 
    $image = mysql_escape_string(file_get_contents($_FILES['photo']['tmp_name'])); 
    $type = $_FILES['photo']['type']; 
    $sqlstr = "insert into photo(type,binarydata) values('".$type."','".$image."')"; 
    //echo $sqlstr; die();   
    //sqlsrv_query($con, $sqlstr) or die(sqlsrv_errors()); 
    sqlsrv_query($con, $sqlstr) ;
    header('location:upload_image_todb.php'); 
    exit(); 
// ДʾͼƬ 
}elseif($action=='show'){ 
    $id = isset($_GET['id'])? intval($_GET['id']) : 0; 
    $sqlstr = "select * from photo where id=$id"; 
    $query = sqlsrv_query($con,$sqlstr) or die(sqlsrv_errors()); 
    $thread = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC); 
    if($thread){ 
        header('content-type:'.$thread['type']); 
        echo $thread['binarydata']; 
        exit(); 
    } 
}else{ 

?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
 <head> 
  <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
  <title> upload image to db demo </title> 
 </head> 
 
 <body> 
  <form name="form1" method="post" action="upload_image_todb.php" enctype="multipart/form-data"> 
  <p>图片<input type="file" name="photo"></p> 
  <p><input type="hidden" name="action" value="add"><input type="submit" name="b1" value="提交"></p> 
  </form> 
 
<?php 
    $sqlstr = "select * from photo order by id desc"; 
    $query = sqlsrv_query($con,$sqlstr) or die(sqlsrv_errors()); 
    $result = array(); 
    while($thread=sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC)){ 
        $result[] = $thread; 
    } 
    foreach($result as $val){ 
        echo '<p><img src="upload_image_todb.php?action=show&id='.$val['id'].'&t='.time().'" width="150"></p>'; 
    } 
?> 
</body> 
</html> 
<?php 
} 
?>