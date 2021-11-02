<?php
session_start();
$_SESSION['resid']=$_POST["id_resid"];
require_once("connect.php");
$db = new DB();
if(!empty($_POST["id_resid"])) {
	$query ="SELECT * FROM sexe";
	$results = $db->runQuery($query);
?>
	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez votre sexe</option>
<?php
	foreach($results as $sexe) {
?>
	<option value="<?php echo $sexe["id"]; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sexe["type"]; ?></option>
<?php
	}
}
?>