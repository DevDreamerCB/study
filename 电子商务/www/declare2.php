<?php
/*
php declare��һ���÷��ǡ�declare(ticks=N);����
��������Zend����ÿִ��1���ͼ�����ȥִ��һ�Ρ�register_tick_function()��ע��ĺ�����

һ���÷��� declare(ticks=N);
ÿִ��һ��php���루����:$num=1;����ȥִ�����Ѿ�ע���tick������
һ����;���ǿ���ĳ�δ���ִ��ʱ�䣬��������Ĵ�����Ȼ����и���ѭ��������ִ��ʱ�䲻�ᳬ��5�롣
*/

declare (ticks=1);

// ��ʼʱ��

$time_start  = time();

// ����Ƿ��Ѿ���ʱ
function  check_timeout(){
     // ��ʼʱ��
     global  $time_start ;
     // 5�볬ʱ

     $timeout  = 5;

     if (time()- $time_start  >  $timeout ){
         exit ( "��ʱ{$timeout}��\n" );
     }

}

// Zend����ÿִ��һ�εͼ�����ִ��һ��check_timeout

register_tick_function( 'check_timeout' );

// ģ��һ�κ�ʱ��ҵ���߼�����Ȼ����ѭ��������ִ��ʱ�䲻�ᳬ��$timeout=5��

while (1){

    $num  = 1;

}