<?php
	session_start();
	unset($_SESSION['logged_login']);
	unset($_SESSION['logged_password']);
	header('Location: ../index.html');
?>