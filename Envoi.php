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
	$check="SELECT * from chambre WHERE id_chambre='".$_SESSION['chambre']."'";
	$chambre= mysqli_query($conn, $check);
	foreach ($chambre as $e) {
		if ($e['reservee'] == 0) {
			$set="UPDATE chambre SET reservee='1' WHERE id_chambre='".$_SESSION['chambre']."'";
    $insert="INSERT INTO demandes (id_utilisateur, nom, prenom, email, classe, demande, validation,commentaire) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['nom']."' , '".$_SESSION['prenom']."' , '".$_SESSION['email']."' , '".$_SESSION['classe']."' , '".$_SESSION['chambre']."' , '0','".$_POST['comment']."')";
      mysqli_query($conn, $set);
      mysqli_query($conn, $insert);
		} else {
			echo '<script>alert(\"la variable est nulle\")</script>';
		}
	}
?>