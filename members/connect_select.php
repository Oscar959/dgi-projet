<?php
include("../conn.php");
include("../connect.php");
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:..');
}

$nom=$_SESSION['name'];
$prenom=$_SESSION['firstname'];
$mdp=$_SESSION['mdp'];
$result=$connect->query("select* from members where name='$nom' and firstname='$prenom' and  mdp='$mdp'");
while($row=$result->fetch()){
	$id = $row['id'];
	$nom = $row['name'];
	$prenom = $row['firstname'];
	$mdp = $row['mdp'];
}

$message="";
if(isset($_POST['action'])){
	$ip=$_SERVER['REMOTE_ADDR'];
	$timing=time();
	$timing_5min= time()-(60*5);
	$output= "";
	$retour=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS nbre_connectes  FROM is_connected "));
	 if($retour['nbre_connectes']==0){
		$query=mysqli_query($con,"INSERT INTO is_connected (members_id,ip, time_connect) VALUES ('$id','$ip', '$timing')");	
	 }else{
		$update=mysqli_query($con,"UPDATE is_connected  SET time_connect='$timing'  WHERE ip='$ip' and members_id='$id'");	
	 }
	 mysqli_query($con, "DELETE FROM is_connected  WHERE time_connect <".$timing_5min);
	 
	 $count_num=mysqli_query($con,"SELECT COUNT(*) AS nbre_connectes FROM is_connected ");
	 $donnes=mysqli_fetch_array($count_num);
	 $message='Vous etes connectés avec succès, bon travail !';
	 




}

    $data= array(
	   'notification'         =>$message
	);

echo json_encode($data);	

?>