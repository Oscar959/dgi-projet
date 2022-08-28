<?php
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:..');
}
include('../connect.php');
include('../conn.php');

$output= "";
$nom=$_SESSION['name'];
$prenom=$_SESSION['firstname'];
$mdp=$_SESSION['mdp'];


$result=$connect->query("select* from members where name='$nom' and firstname='$prenom' and  mdp='$mdp'");
while($row=$result->fetch()){
	$id = $row['id'];
	$nom=$row['name'];
	$prenom=$row['firstname'];
	$mdp=$row['mdp'];
}


if(isset($_POST['latitude']) and isset($_POST['longitude'])){

	$latitude=$_POST['latitude'];
	$longitude=$_POST['longitude'];
	$var=$_SERVER['REMOTE_ADDR'];

	$query2=$connect->exec("UPDATE members SET longitude='$longitude', latitude='$latitude', ip='$var' WHERE id= '$id'");
	if($query2){
		$output= "Great";
	}else{
		$output= $id;
	}

	//echo $output;
}
?>