<?php
session_start();
require_once("connect.php");
$db = new DB();
$conn=new mysqli("localhost", "root", "", "hébergement");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$set="UPDATE chambre SET reservee='1' WHERE id_chambre='".$_SESSION['chambre']."'";
$insert="INSERT INTO reservationadmin (nom, chambre, commentaire) VALUES ('".$_POST['personne']."','".$_SESSION['chambre']."', '".$_POST['comment']."')";
mysqli_query($conn, $set);
mysqli_query($conn, $insert);
?>
