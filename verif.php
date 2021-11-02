<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
$hostname='localhost';
$db_username='root';
$db_password='';
$dbname='hébergement';

$db = mysqli_connect($hostname, $db_username, $db_password,$dbname)
           or die('could not connect to database');
$username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
$password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              username = '".$username."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: http://localhost/page4.php');
        }
        else
        {
           header('Location: http://localhost/page2.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: http://localhost/page2.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: http://localhost/page2.php');
}
mysqli_close($db); // fermer la connexion
?>