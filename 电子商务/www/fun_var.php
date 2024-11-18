<?php
/*
PHP 支持可变函数的概念。这意味着如果一个变量名后有圆括号，
PHP 将寻找与变量的值同名的函数，并且尝试执行它。
*/
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.<br />\n";
}

$func = 'foo';

$func();        //  执行 foo(); 命令行中输出：In foo()<br />

$func = 'bar';

$func('test');   // 执行 bar();命令行中输出：In bar(); argument was 'test'.<br />
?>
<br>

<?php
/*可变函数的语法来调用一个对象的方法。*/
class Foo
{
    function Variable()
    {
        $name = 'Bar';
        $this->$name(); // This calls the Bar() method
    }

    function Bar()
    {
        echo "This is Bar";
    }

}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();   // This calls $foo->Variable()

// 命令行执行输出： This is Bar
?>