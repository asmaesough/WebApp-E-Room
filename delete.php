<?php
session_start();
$conn=new mysqli("localhost", "root", "", "hébergement");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$add="INSERT INTO demandes_annulees (id_utilisateur, nom, prenom, email, classe, demande_annulee, commentaire_demande) VALUES ('".$_POST['id_user']."', '".$_SESSION['nom']."' , '".$_SESSION['prenom']."' , '".$_SESSION['email']."' , '".$_SESSION['classe']."' , '".$_SESSION['chambre']."', '".$_SESSION['comment']."')";
$set="UPDATE chambre SET reservee='0' WHERE id_chambre='".$_SESSION['chambre']."'";
$delete="DELETE FROM demandes WHERE id_utilisateur='".$_SESSION['id_user']."'";
mysqli_query($conn, $add);
mysqli_query($conn, $set);
mysqli_query($conn, $delete);
?>