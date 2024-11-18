<?php
header("Content-type:image/ "); 

$serverName = "ZJL-PC";
$connectionInfo = array( "Database"=>"GWEDDB");
$con = sqlsrv_connect( $serverName, $connectionInfo);

if( !$con )
{
     echo "Connection could not be established.\n";
     die( print_r( sqlsrv_errors(), true));
}

$SQL = "select * from dbo.t_accident_image where image_id=".$_GET["imageid"];

//$RS->open($SQL,$Conn,1,3);//执行语句,返回记录集
//$RS0 = mysql_query($SQL);
$RS0 = sqlsrv_query($con,$SQL);

$RS = sqlsrv_fetch_array($RS0,SQLSRV_FETCH_ASSOC);
echo $RS["imagephoto"]; 
?>