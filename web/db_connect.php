<?php
	$username = "atuser";
	$password = "@tus3r";
	$hostname = "localhost"; 

	//connection to the database
	mysql_connect($hostname, $username, $password)or die("Unable to connect to MySQL");      
	mysql_select_db("atdb") or die("Could not select atdb");
?>


