<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
 <head> 
  <meta http-equiv="content-type" content="text/html; charset=utf-8"> 
  <title> upload image to db demo </title> 
 </head> 
 
 <body> 
  <form name="form1" method="post" action="upload_image_todb.php" enctype="multipart/form-data"> 
  <p>??¡êo<input type="file" name="photo"></p> 
  <p><input type="hidden" name="action" value="add"><input type="submit" name="b1" value="???"></p> 
  </form> 
 
<?php 
    $sqlstr = "select * from photo order by id desc"; 
    $query = mysql_query($sqlstr) or die(mysql_error()); 
    $result = array(); 
    while($thread=mysql_fetch_assoc($query)){ 
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