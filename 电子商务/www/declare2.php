<?php
/*
php declare的一般用法是“declare(ticks=N);”，
其作用是Zend引擎每执行1条低级语句就去执行一次“register_tick_function()”注册的函数。

一般用法是 declare(ticks=N);
每执行一句php代码（例如:$num=1;）就去执行下已经注册的tick函数。
一个用途就是控制某段代码执行时间，例如下面的代码虽然最后有个死循环，但是执行时间不会超过5秒。
*/

declare (ticks=1);

// 开始时间

$time_start  = time();

// 检查是否已经超时
function  check_timeout(){
     // 开始时间
     global  $time_start ;
     // 5秒超时

     $timeout  = 5;

     if (time()- $time_start  >  $timeout ){
         exit ( "超时{$timeout}秒\n" );
     }

}

// Zend引擎每执行一次低级语句就执行一下check_timeout

register_tick_function( 'check_timeout' );

// 模拟一段耗时的业务逻辑，虽然是死循环，但是执行时间不会超过$timeout=5秒

while (1){

    $num  = 1;

}