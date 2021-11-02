<?php
session_start();
error_reporting(0);
$_SESSION['nom1']="bonjour";

?>
<?php

if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap://10.1.27.110:389";
    $BaseDn="OU=WLC-USERS,DC=emines,DC=um6p,DC=local";
    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user="fog";
    $pwd="Test2020";
    $ldaprdn = 'emines' . "\\" . $user;

	                              ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
                                  ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

if (strlen(trim($password)) == 0) { 
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
                $_SESSION['nom']=$info[$i]["givenname"][0];   
        }
        ldap_close($ldap);
    } else {
        header('Location: http://localhost/page2.php?erreur=1');

        echo '<img class="err" style=" width:2Opx; height: 20px;" src="https://icon-library.net/images/error-icon-transparent/error-icon-transparent-24.jpg" style=> <p style="color:red">Utilisateur ou mot de passe incorrect!</p>';
    }
}else echo 'Problem in binAdmin';
}
}
else{

?>
<?php } 
session_unset();
?> 
