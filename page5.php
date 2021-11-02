<?php
session_start();
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
      $insert="INSERT INTO demandes (nom, prenom, email, classe, demande, validation) VALUES ('".$_SESSION['nom']."' , '".$_SESSION['prenom']."' , '".$_SESSION['email']."' , '".$_SESSION['classe']."' , '".$_SESSION['chambre']."' , '0')";
        mysqli_query($conn, $set);
        mysqli_query($conn, $insert);
        }  
?>
<!DOCTYPE>
<html>
<head>
	<title></title>
	<meta charset='utf-8'>
	<div id="container">
    <link href="css/page5.css" media="screen" rel="stylesheet" type="text/css">	
	</div>
</head>
<body>
  <header>
           <img src="../img/logo.png">
            <nav>
                <ul>
                    <?php
                    // afficher un message
                
                echo "<p><strong> ". $_SESSION['prenom'] ." " . $_SESSION['nom'] ."</strong></p>";
                echo '<img class="user" src="img/user.png" style="height: 20px; width: 20px;">';
 
                echo '<img class="logout" src="img/logout.png" style="height: 20px; width: 20px;">';

                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:http://localhost/page2.php");
                   }
                }
        ?>
        <a href='http://localhost/page4.php?deconnexion=true'><span>Déconnexion</span></a>
                </ul>
            </nav>
        </header>
    
	<img class="valid" src="https://www.locationvoitureguadeloupediscount.fr/wp-content/uploads/2018/10/validation.png">
    <h1 > <?php echo" Votre demande de réservation de $ch a été envoyée!"?> </h1>
    <h2>Vous recevrez un mail après validation.</h2>
    <button>Annuler votre demande</button>
    <script src="../js/sweetalert2.all.min.js"></script>
    <script type="text/javascript">   
      </script>
 
</body>
</html>