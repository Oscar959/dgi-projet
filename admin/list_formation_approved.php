<?php
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login');
}

include('../connect.php');
include('../conn.php');
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$query2=$connect->exec("UPDATE membres_form  SET statut='1' WHERE id= '$id'");
	if($query2){
		echo "good";
	}else{
		echo "good1";
	}
}
?>