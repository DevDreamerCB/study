<?php
/*
在 try 语句块中试着判断当前目录下是否存在名为 test 的目录，如果不存在这个目录，那么就会执行第 7 行的代码，通过关键字 throw 抛出异常。这个异常是一个 Exception 类的对象，通过 new 关键字生成，并且用错误信息 $err 和错误代码 12345 初始化该对象，以便后面 catch 该异常时（代码第 11 行），可以获取这些信息。

一旦抛出异常，那么 try 语句块中剩下的代码就不再继续执行，程序流程转至相应的 catch 语句块执行，最终通过 Exception 对象调用其成员函数输出错误信息和代码。
*/
    try{

        $err = '抛出异常信息，并跳出 try 语句块';

        if(is_dir('./test11')){

            echo '这里是一些可能会发生异常的代码';

        }else{

            throw new Exception($err, 12345);   // 抛出异常

        }

        echo '上面抛出异常的话，这行代码将不会执行，转而执行 catch 中的代码。<br>';

    }catch(Exception $e){

        echo '捕获异常：'.$e->getMessage().'<br>错误代码：'.$e->getCode().'<br>';

    }

    echo '继续执行 try catch 语句之外的代码';

?>