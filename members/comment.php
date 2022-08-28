<?php
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login.php');
}
include('../conn.php');
include('../connect.php');
session_start();	
function apostrophe($data){
		 $cut=explode("'",$data);
		 $ready=implode('\\\'',$cut);
		 return $ready;
}
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:users_connect_login.php');
}
        $nom=$_SESSION['name'];
		$prenom=$_SESSION['firstname'];
		$mdp=$_SESSION['mdp'];
		$result=$connect->query("select* from admin
								where name='$nom' AND firstname='$prenom' AND mdp='$mdp'");
		 while($records=$result->fetch()){
         $id=$records['id'];

if (isset($_POST['nom'])){
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$notif=$_POST['notif'];
	$message=apostrophe($_POST['message']);
	
	$insert="insert into comment values(null,'$message',$notif,now(), $id)";
	$result=mysqli_query($con,$insert);
}
		 }


 ?>