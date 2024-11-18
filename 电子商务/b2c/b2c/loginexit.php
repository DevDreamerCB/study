<?php
	session_start();
	unset($_SESSION['userid']);
	unset($_SESSION['usertype']);
	session_destroy();
	header("location: userlogin.htm");
?>