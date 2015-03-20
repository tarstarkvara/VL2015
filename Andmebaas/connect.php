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

function annaHaal($haaletuse_id, $kandidaadi_id, $haaletaja_id)
{
	$conn = connect();
	$sql = "INSERT INTO haal(haaletuse_id,kandidaadi_id,haaletaja_id) VALUES (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $haaletuse_id);
	$stmt->bindValue(2, $kandidaadi_id);
	$stmt->bindValue(3, $haaletaja_id);
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

function haaletuseTulem($nimi)
{
	$conn = connect();
	$sql = "SELECT * FROM v_haaletanuid WHERE nimi = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $nimi);
	$stmt->execute();
}
function isikuTulemused($kandidaadi_id)
{
	$conn = connect();
	$sql = "SELECT * FROM v_haalte_jaotus WHERE kandidaadi_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $kandidaadi_id);
	$stmt->execute();
}
function isikuTulemused_Haaletusel($kandidaadi_id, $haaletuse_id)
{
	$conn = connect();
	$sql = "SELECT * FROM v_haalte_jaotus WHERE kandidaadi_id = ? AND haaletuse_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(1, $kandidaadi_id);
	$stmt->bindValue(2, $haaletuse_id);
	$stmt->execute();
}
?>
