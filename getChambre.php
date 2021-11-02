<?php
session_start();
require_once("connect.php");
$db = new DB();
if(!empty($_POST["id_cham"])) {
	$query ="SELECT * FROM chambre WHERE id = '". $_POST["id_cham"] . "' AND reservee =0";
	$results=$db->runQuery($query);
	foreach($results as $chambre) {
		$_SESSION['chambre']=$chambre["id_chambre"];
	}
}
?>

