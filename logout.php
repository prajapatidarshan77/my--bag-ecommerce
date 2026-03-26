<?php
	session_start();

	session_destroy();

	header("location:A_login.php");
?>