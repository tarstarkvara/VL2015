<?php
include_once 'connect.php';
$conn = connect();

$sql = "CREATE VIEW haaletuse_kandidaadid AS SELECT kandidaat.kandidaadi_id, 
        isik.nimi, isik.perenimi, kandidaat.haaletuse_id from 
        isik join kandidaat on isik.id=kandidaat.kandidaadi_id";

$sql = "CREATE VIEW kaimas_haaletus AS SELECT id,nimi FROM haaletus group by loppaeg,algusaeg,id,nimi 
        having algusaeg<current_timestamp and loppaeg>current_timestamp";

$sql = "CREATE VIEW loppenud_haaletus AS SELECT id,nimi FROM haaletus group by loppaeg,id,nimi 
        having loppaeg<current_timestamp";
        
$sql = "CREATE VIEW tulemas_haaletus AS SELECT id,nimi FROM haaletus group by loppaeg,algusaeg,id,nimi 
        having algusaeg>current_timestamp";

$sql = "CREATE VIEW haaletanuid AS SELECT haaletus.nimi, COUNT(*) FROM haal JOIN haaletus ON
	haal.haaletuse_id=haaletus.haaletuse_id GROUP BY haaletus.nimi";

try{
	$conn->query($sql);
}
catch(Exception $e){
	print_r($e);
}
echo "<h3>Views created.</h3>";
?>
