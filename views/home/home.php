<?php
include_once dirname(__file__,3)."/models/funtions.php";
$wel = new WelMaster();

$infoUser = json_decode( $wel->decrypt($_COOKIE["dataUser"]) ,true);
echo "<pre>";
echo "<h3>Cookie encrypt</h3><br>";
print_r($_COOKIE["dataUser"]);

echo "<h3>Cookie decrypt</h3><br>";
print_r($infoUser);
echo "</pre>";

?>