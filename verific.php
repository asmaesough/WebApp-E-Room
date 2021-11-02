<?php
session_start();
echo $_SESSION['chambre'];
$ch=$_SESSION['chambre'];
require_once("connect.php");
$db = new DB();
$conn=new mysqli("localhost", "root", "", "hébergement");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
    $req="SELECT reservee FROM chambre WHERE id_chambre='".$_SESSION['chambre']."'";
    $rslt = $db->runQuery($req);

    if ($rslt==1){
        echo "Cette chambre n'est plus disponible";
    }
     else{ 
      $set="UPDATE chambre SET reservee='1' WHERE id_chambre='".$_SESSION['chambre']."'";
      $insert="INSERT INTO demandes (nom, prenom, email, classe, demande, validation) VALUES ('".$_SESSION['nom']."' , '".$_SESSION['prenom']."' , '".$_SESSION['email']."' , '".$_SESSION['department']."' , '".$_SESSION['chambre']."' , '0')";
        mysqli_query($conn, $set);
        mysqli_query($conn, $insert);
        }  
      }
?>