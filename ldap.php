<?php
if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap://10.1.27.111:389";
    $BaseDn="OU=WLC-USERS,DC=emines,DC=um6p,DC=local";
    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user="";
    $pwd="";
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
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> 
		(" . $info[$i]["samaccountname"][0] .")
		<br /> Email : ". $info[$i]["mail"][0] ."<br /> Fonction : ". $info[$i]["title"][0] .
		" <br /> Department : ". $info[$i]["department"][0] ." <br /> Title : ". $info[$i]["mail"][0] ."</p>\n";
     
        }
        ldap_close($ldap);
    } else {
        $msg = "Invalid username / password";
        echo $msg;
    }
}else echo 'Problem in binAdmin';
}
}
else{
?>
    <form action="#" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /> 
        <label for="password">Password: </label><input id="password" type="password" name="password" />        
        <input type="submit" name="submit" value="Submit" />
    </form>
<?php } ?> 
