<?php
session_start();
$_SESSION['sexe']=$_POST["id_sexe"];
require_once("connect.php");
$db = new DB();
if(!empty($_POST["id_sexe"])) {
	$query ="SELECT * FROM bloc WHERE id_sexe = '". $_POST["id_sexe"] . "' AND id_resid = '". $_SESSION["resid"] . "' ";
	$results = $db->runQuery($query);
?>
	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez un bloc</option>
<?php
	foreach($results as $bloc) {
?>
	<option value="<?php echo $bloc["id"]; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $bloc["nom_bloc"]; ?></option>
<?php
	}
}
?>