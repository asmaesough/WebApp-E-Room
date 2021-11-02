<?php
 session_start();
 
// check if form was submitted
$connect = mysqli_connect("localhost", "root", "", "hébergement");

    $r=$_POST['chambre'];
	
	$e=$_SESSION['email'];

$headers = "From: $e" ;
mail("$e","Demande de reservation","votre demande de réservation de ".$r." a été acceptée ",$headers);
 
	  $query = "UPDATE demandes SET validation='1' WHERE demande='".$r."'   ";
	  mysqli_query($connect, $query);
        
?>