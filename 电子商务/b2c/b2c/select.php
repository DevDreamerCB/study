<?php
session_start();
if($_SESSION['usertype'] == "1" && $_SESSION['userid'] != "0")
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1" runat="server">
    <title>无标题页</title>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
</head>
<body>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        商品名：<input type="text" name="productname"><br>
        商品价格：<input type="text" name="price"><br>
        商品图片：<input type="file" name="afile1"><br>
       <input type="submit" value="提交" >
       <input type="hidden" name="ifupload" value=1>
    </form>
</body>
</html>
<?php
}
else
{
    die('<script language="javascript">top.location.href="loginexit.php"</script>');
}
?>