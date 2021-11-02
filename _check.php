<?php
	session_start();
	require_once("connect.php");
	$db = new DB();
	$query="SELECT * FROM chambre WHERE id_chambre='".$_SESSION['chambre']."'";
	$result= $db->runQuery($query);
	foreach ($result as $demande) {
	    $_SESSION['reserv']=$demande['reservee'];
	}
	echo $_SESSION['reserv'];
?>