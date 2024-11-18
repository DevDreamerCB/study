<?php
    $name = '测试';
    //下面<<<EOT后面不能有空格
    print <<<EOT
            <html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
            <title>Untitled Document</title>
            </head>
            <body>
            <!--12321-->
            Hello,{$name}!
            Hello,$name!
            </body>
            </html>
<!--注意末尾的结束符必须靠边，其前面后面不能有空格-->
EOT;
?>

<?php
$out = 
<<<EOF
    <a href="javascript:edit('asd', 'aaa')">编辑</a> |
 
    <font color="#ccc">删除</font>
 
    <a href="javascript:confirmurl('?m=admin&posid=12')">删除</a> |
 
    <font color="red">启用</font></a> |  
 
    <a href="javascript:preview('3','ds')"><font color="green">演示</font></a>
EOF;
 
echo $out;
?>