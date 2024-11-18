<?php

$fp = @fsockopen('smtp.sina.com', 465, $errno, $errstr, 30);
   
    if(empty($fp)) {
      echo  "Failed to connect to server". $errno. "errstr";
    }
                           
if (!$fp) {   
echo "$errstr ($errno)<br />\n";   
echo "error";
} else {   
$out = "GET / HTTP/1.1\r\n";   
$out .= "Host: smtp.sina.com\r\n";   
$out .= "Connection: Close\r\n\r\n";   

fwrite($fp, $out);   
while (!feof($fp)) {   
echo "test";
echo fgets($fp, 128);   
}   
fclose($fp);   
} 