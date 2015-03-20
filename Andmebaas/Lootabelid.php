<?php
include_once 'connect.php';
$conn = connect();
$sql = "CREATE TABLE isik(
			id INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),
			nimi VARCHAR(50),
			perenimi VARCHAR(50),
			isikukood INT,
			kasutajanimi UNIQUE NOT NULL VARCHAR(50),
			parool UNIQUE NOT NULL VARCHAR(50))";
			
$sql = "CREATE TABLE kandidaat(
			kandidaadi_id INT NOT NULL, 
			PRIMARY KEY(kandidaadi_id),
			haaletuse_id INT)";
			
$sql = "CREATE TABLE haal(
			id INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),
			haaletuse_id INT,
			kandidaadi_id INT,
			haaletaja_id INT)";
$sql = "CREATE TABLE haaletus(
			haaletuse_id INT NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),
			algusaeg DATE,
			loppaeg DATE,
			nimi VARCHAR(80))";
try{
	$conn->query($sql);
}
catch(Exception $e){
	print_r($e);
}
echo "<h3>Tables created.</h3>";
?>
