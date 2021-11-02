<?php 
session_start();
$conn=new mysqli("localhost", "root", "", "hébergement");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$comment=$_POST['comment'];
$query="INSERT INTO demandes (commentaire) VALUES ('".$comment."')";
mysqli_query($conn, $query);
?>