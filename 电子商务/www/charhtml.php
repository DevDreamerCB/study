<!DOCTYPE html>
<html>
<body>

<?php
/*
htmlspecialchars() ������Ԥ������ַ�ת��Ϊ HTML ʵ�塣

Ԥ������ַ��ǣ�

& ���ͺţ���Ϊ &
" ��˫���ţ���Ϊ "
' �������ţ���Ϊ '
< ��С�ڣ���Ϊ <
> �����ڣ���Ϊ >
*/
$str = "This is some <b>bold</b> text.";
echo htmlspecialchars($str);
?>

<p>�� < �� > ת��Ϊʵ�峣���ڷ�ֹ������������� HTML Ԫ�ء����û���Ȩ������ҳ������ʾ����ʱ�����ڷ�ֹ�������зǳ����á�</p>

<?php
//nl2br() �������ַ����е�ÿ�����У�\n��֮ǰ���� HTML ���з���<br> �� <br />����
echo nl2br("One line.\nAnother line.");
?>

</body>
</html>