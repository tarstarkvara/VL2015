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

function addIsik($nimi, $perenimi, $isikukood, $kasutajanimi, $parool)
{
	$conn = connect();
	$sql = "INSERT INTO isik (name, category, date, is_complete) VALUES (?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $nimi);
	$stmt->bindValue(2, $perenimi);
	$stmt->bindValue(3, $isikukood);
	$stmt->bindValue(4, $kasutajanimi);
	$stmt->bindValue(5, $parool);
	$stmt->execute();
}

function addHaaletus($algusaeg, $loppaeg, $nimi)
{
	$conn = connect();
	$sql = "INSERT INTO isik (algusaeg, loppaeg, nimi) VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $algusaeg);
	$stmt->bindValue(2, $loppaeg);
	$stmt->bindValue(3, $nimi);
	$stmt->execute();
}
?>
