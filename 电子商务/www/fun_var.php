<?php
/*
PHP ֧�ֿɱ亯���ĸ������ζ�����һ������������Բ���ţ�
PHP ��Ѱ���������ֵͬ���ĺ��������ҳ���ִ������
*/
function foo() {
    echo "In foo()<br />\n";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.<br />\n";
}

$func = 'foo';

$func();        //  ִ�� foo(); �������������In foo()<br />

$func = 'bar';

$func('test');   // ִ�� bar();�������������In bar(); argument was 'test'.<br />
?>
<br>

<?php
/*�ɱ亯�����﷨������һ������ķ�����*/
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

// ������ִ������� This is Bar
?>