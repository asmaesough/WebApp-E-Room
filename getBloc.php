<?php
session_start();
require_once("connect.php");
$db = new DB();
if(!empty($_POST["id_bloc"])) {
	$query ="SELECT * FROM appartement WHERE id_bloc = '". $_POST["id_bloc"] . "' ";
	$results = $db->runQuery($query);
?>
	<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez un appartement</option>
<?php
	foreach($results as $appartement) {
?>
	<option value="<?php echo $appartement["id"]; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $appartement["appart"]; ?></option>
<?php
	}
}
?>