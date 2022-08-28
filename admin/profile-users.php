<?php
include("../conn.php");
include("../connect.php");
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:../');
}

    $nom=$_SESSION['name'];
	$prenom=$_SESSION['firstname'];
	$mdp=$_SESSION['mdp'];
	$result=$connect->query("select* from admin where name='$nom' and firstname='$prenom' and  mdp='$mdp'");
	while($row=$result->fetch()){
	$nom=$row['name'];
	$prenom=$row['firstname'];
	$mdp=$row['mdp'];
	$id=$row['id'];
	$photo= $row['photo'];
	}	

$output='';
if(isset($_POST["id"])){
	$id=$_POST["id"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$ps=$_POST["postnom"];
	$mdp=md5($_POST["mdp"]);
	$profession=$_POST["profession"];
	
	$file_name=$_FILES['photo']['name'];
	$file_tmp=$_FILES['photo']['tmp_name'];
    $file_size=$_FILES['photo']['size'];
	$file_error=$_FILES['photo']['error'];
	$file_type=$_FILES['photo']['type'];
	
    if($file_name != ''){
		$file_name=$file_name=$_FILES['photo']['name'];
	}else{
		$file_name=$photo;
	}
	
		  
		if(is_uploaded_file($file_tmp)){
			if($file_size < 2097152){
				if($file_type= 'image/jpg'){
					unlink("../uploads/".$photo);
					if(move_uploaded_file($file_tmp, "../uploads/$file_name")){
				    	$output= '<p class="alert alert-success">file uploaded successefully</p>';
					}else{
						$output= '<p class="alert alert-success">file uploaded failed</p>';
					}
					}else{
						$output= '<p class="alert alert-success">file not image</p>';
					}
					}else{
						$output= '<p class="alert alert-success">2M only</p>';
					}
					}else{
				     	$output= '<p class="alert alert-success">Please select a file</p>';
					}
					
	$query="UPDATE admin SET name = '$nom', firstname = '$prenom', middlename = '$ps', mdp = '$mdp',picture = '$file_name' WHERE id = '$id'";	
    $query_exec=mysqli_query($con, $query);
	if($query_exec){
	}else{
		$output='<p class="alert alert-success">Cà n\'as pas marché</p>';
	}
	echo $output;

}





?>