<!DOCTYPE html>
<html>
<body>

<?php
/*
htmlspecialchars() 函数把预定义的字符转换为 HTML 实体。

预定义的字符是：

& （和号）成为 &
" （双引号）成为 "
' （单引号）成为 '
< （小于）成为 <
> （大于）成为 >
*/
$str = "This is some <b>bold</b> text.";
echo htmlspecialchars($str);
?>

<p>把 < 和 > 转换为实体常用于防止浏览器将其用作 HTML 元素。当用户有权在您的页面上显示输入时，对于防止代码运行非常有用。</p>

<?php
//nl2br() 函数在字符串中的每个新行（\n）之前插入 HTML 换行符（<br> 或 <br />）。
echo nl2br("One line.\nAnother line.");
?>

</body>
</html>