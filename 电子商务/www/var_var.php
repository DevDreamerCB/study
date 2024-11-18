<?php

function takes_array($input)
{
  echo "$input[0] + $input[1] = ", $input[0]+$input[1] , "<br>";
  echo '$input[0] + $input[1] = ', $input[0]+$input[1] , "<br>";
}

$arr = array(2, 3, 4);

takes_array($arr);


?>