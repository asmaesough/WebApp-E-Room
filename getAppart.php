<?php
session_start();
require_once("connect.php");
$db = new DB();
if(!empty($_POST["id_appart"])) {
	$query ="SELECT * FROM chambre WHERE id_appart = '". $_POST["id_appart"] . "' AND reservee = 0 ";
	$results = $db->runQuery($query);
?>
	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez une chambre</option>
<?php
	foreach($results as $chambre) {
?>
	<option value="<?php echo $chambre["id"]; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $chambre["cham"]; ?></option>
<?php
	}
}
?>