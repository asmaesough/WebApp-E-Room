
<?php

// LDAP variables
$ldapuri = "ldap://10.1.27.110:389";  // voter ldap-uri

// Connexion LDAP
$ldapconn = ldap_connect($ldaphost, $ldapport)
          or die("Cette LDAP-URI n'a pas été analysable");

?>
