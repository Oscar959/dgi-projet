<?php
include('../connect.php');
include('../conn.php');
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$query2=$connect->exec("DELETE FROM contact_us WHERE id='$id'");
	
}
?>