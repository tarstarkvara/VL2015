<?php
include_once 'connect.php';
$conn = connect();

$sql = "CREATE VIEW haaletuse_kandidaadid AS SELECT kandidaadid.kandidaadi_id, 
        isik.nimi, isik.perenimi, kandidaadid.haaletuse_id from 
        isik join kandidaadid on isik.id=kandidaadid.kandidaadi_id";

$sql = "CREATE VIEW kaimas_haaletus AS SELECT id,nimi FROM haaletused group by loppaeg,algusaeg,id,nimi 
        having algusaeg<current_timestamp and loppaeg>current_timestamp";

$sql = "CREATE VIEW loppenud_haaletus AS SELECT id,nimi FROM haaletused group by loppaeg,id,nimi 
        having loppaeg<current_timestamp";
        
$sql = "CREATE VIEW tulemas_haaletus AS SELECT id,nimi FROM haaletused group by loppaeg,algusaeg,id,nimi 
        having algusaeg>current_timestamp";

try{
	$conn->query($sql);
}
catch(Exception $e){
	print_r($e);
}
echo "<h3>Views created.</h3>";
?>
