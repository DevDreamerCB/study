<?php
    $name = '����';
    //����<<<EOT���治���пո�
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
<!--ע��ĩβ�Ľ��������뿿�ߣ���ǰ����治���пո�-->
EOT;
?>

<?php
$out = 
<<<EOF
    <a href="javascript:edit('asd', 'aaa')">�༭</a> |
 
    <font color="#ccc">ɾ��</font>
 
    <a href="javascript:confirmurl('?m=admin&posid=12')">ɾ��</a> |
 
    <font color="red">����</font></a> |  
 
    <a href="javascript:preview('3','ds')"><font color="green">��ʾ</font></a>
EOF;
 
echo $out;
?>