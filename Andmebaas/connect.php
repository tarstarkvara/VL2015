<?php

function connect()
{
	$host = "un71b0lmep.database.windows.net\sqlexpress"; 
	$user = "valimised";
	$pwd = "Shootingblanks!";
	$db = "utvalimisedDB";
	try{
		$conn = new PDO( "sqlsrv:Server= $host ; Database = $db ", $user, $pwd);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e){
		die(print_r($e));
	}
	return $conn;
}
?>
