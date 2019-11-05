<?php

	$username = "";
	$passwordbd = "";
	$hostname = "localhost";
	$db = mysqli_connect($hostname,$username,$passwordbd);
	mysqli_set_charset($db , "utf8");
	mysqli_select_db($db,"Optic-Shop");
	
?>