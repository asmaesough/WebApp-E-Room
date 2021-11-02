<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <div class="box" style="width:1000px;height:100px;border:0px solid #1B3F91;">
    <meta charset='utf-8'>
    <link rel="stylesheet" media="screen" type="text/css" title="page2" href="css/page2.css">
</head>
<body>
     <div id="container">
        <form action="#" method="POST">
      <!-- ldap -->  
    <h1></h1>
    <br />
    <h2>Connexion</h2>
        <label for="username"><b>Nom d'utilisateur </b></label><input id="username" type="text" name="username"  placeholder="Entrer le nom d'utilisateur" required > <br /><br />
        <label for="password"><b>Mot de passe</b> </label><input id="password" type="password" name="password" placeholder="Entrer le mot de passe" required> <br /><br /><br />      
        <input type="submit" name="submit" value="Connexion" />   
    </div> 
    </form>
</body>
</html>
<?php
error_reporting(0);
if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap://10.1.27.110:389";
    $BaseDn="OU=WLC-USERS,DC=emines,DC=um6p,DC=local";
    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user="TestLectureLdap";
    $pwd="Tes2020";
    $ldaprdn = 'emines' . "\\" . $user;

                                  ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                                  ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
      
               if (strlen(trim($password)) == 0) { 
                header('Location: http://localhost/page2.php');
                $msg1 = "Mot de passe vide";
                echo $msg1;
}
else{
    

$bindAdmin = ldap_bind($ldap, $ldaprdn, $pwd);



if($bindAdmin) {


$filter="(mailNickname=$username)";
$result = ldap_search($ldap,$BaseDn,$filter);
$info = ldap_get_entries($ldap, $result);
$Userrdn= 'emines' . "\\" .$info[0]["samaccountname"][0];    


$bindUser = ldap_bind($ldap, $Userrdn, $password);

if ($bindUser) {

        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;         
                $_SESSION['prenom']=$info[$i]["givenname"][0];   
                $_SESSION['nom']=$info[$i]["sn"][0];
                $_SESSION['email']=$info[$i]["mail"][0];
                $_SESSION['classe']=$info[$i]["department"][0];
        }
        header('Location: http://localhost/page4.php');
        echo "<p><strong>" . $info[$i]["givenname"][0] ." ". $info[$i]["sn"][0] ."</strong><br /></p>\n";
        ldap_close($ldap);
    } else {
        echo '<img class="err" style=" width:2Opx; height: 20px;" src="https://icon-library.net/images/error-icon-transparent/error-icon-transparent-24.jpg" style=> <p style="color:red">Utilisateur ou mot de passe incorrect!</p>';
    }
}else echo 'Problem in binAdmin';
}   
}
?>