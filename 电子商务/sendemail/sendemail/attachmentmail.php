<?php
header("Content-type: text/html; charset=GB2312"); 

function postmail_jiucool_com($to, $subject = "", $body = ""){

    //Author:Jiucool WebSite: http://www.jiucool.com 
    //$to 表示收件人地址 $subject 表示邮件标题 $body表示邮件正文$Attachment表示邮件附件
    //error_reporting(E_ALL);
    error_reporting(E_STRICT);

    date_default_timezone_set("Asia/Shanghai");//设定时区东八区

    require_once('class.phpmailer.php');
    include("class.smtp.php"); 
    $mail             = new PHPMailer(); //new一个PHPMailer对象出来  
    $body             = eregi_replace("[\]",'',$body); //对邮件内容进行必要的过滤
    //$mail->CharSet ="UTF-8";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->CharSet ="gb2312";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP(); // 设定使用SMTP服务
    $mail->SMTPDebug  = 1;                     // 启用SMTP调试功能
                                           // 1 = errors and messages
                                           // 2 = messages only
                                           
	
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    //$mail->SMTPSecure = "ssl";                 // 安全协议
    //不要用ssl协议
    $mail->Host       = "smtp.sina.com";      // SMTP 服务器  
    //$mail->Host       = "smtp.163.com";      // SMTP 服务器
    //$mail->Port       = 465;                   // SMTP服务器的端口号
    $mail->Port       = 25;                   // SMTP服务器的端口号
    $mail->Username   = "php_mailer99@sina.com";  // SMTP服务器用户名
    $mail->Password   = "e4267d6345248c2a";            // SMTP服务器密码
    $mail->SetFrom('php_mailer99@sina.com', 'php_mailer');
    $mail->AddReplyTo("php_mailer99@sina.com","php_mailer");
    //$mail->Username   = "php_mailer@163.com";  // SMTP服务器用户名
    //$mail->Password   = "123456php";            // SMTP服务器密码
    //$mail->SetFrom('php_mailer@163.com', 'php_mailer');
    //$mail->AddReplyTo("php_mailer@163.com","php_mailer");

    $mail->Subject    = $subject;
    $mail->AltBody    = "To view the message, please use an HTML compatible email viewer! - From www.jiucool.com"; // optional, comment out and test
    $mail->MsgHTML($body);

	 $Attachment     = array();
	 $filename  = array();

  	for($i=1;$i<=2;$i++) {
     	$files="afile$i";     
	 	array_push($Attachment, $_FILES[$files]['tmp_name']);
		array_push($filename, $_FILES[$files]['name']);
	}

	for ($i=0;$i<count($Attachment);$i++)
	{
		$mail->AddAttachment($Attachment[$i],$filename[$i]);  
	}

    $address = $to;
    $mail->AddAddress($address, "zhou_jianlan");

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!恭喜，邮件发送成功！";
        }
}

//array_push($Attachment, "C:/Program Files/Apache Group/Apache2/phpdocs/foreach.php”);
if($_POST["ifupload"]=="1") {
 		$content = $_POST["S1"] . " ";
 		$title = $_POST["T1"] . ""; 
 		$mailaddress = $_POST["mailaddress"];
		postmail_jiucool_com( $mailaddress,$title,$content);   
}

?>