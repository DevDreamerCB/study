<?php
  require("util.inc");
  function showVar($var)
  {

    if (PHPVERSION==4)
    {
       PRINT_R($var);
    }
    else
    {
       var_dump($var);
    }
  }
?>