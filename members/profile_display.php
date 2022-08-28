<?php

session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:../');
}

 include("../conn.php");
 include("../connect.php");
 $output="";
 if($_POST['userid']){
	 $id= $_POST['userid'];
	 $query= "SELECT * from members where id=$id";
	 $q=mysqli_fetch_array(mysqli_query($con, $query));
	 
	 
	 $output="   	     
		    <small style='display:none'>
			    <input type='text' id='id' value=".$q['id']." name='id' class='form-control'>
			</small>
			<small>Nom</small>
			    <input type='text' id='nom' value=".$q['name']." name='nom' class='form-control'>
			<small>Postnom</small>
			    <input type='text' id='postnom' value=".$q['middlename']." name='postnom' class='form-control'>  
			<small>Prenom</small>
			    <input type='text' id='prenom' value=".$q['firstname']." name='prenom' class='form-control'>
				<div class='form-group mdp'>
					 <small>Votre mot de passse(mettez le)</small>
					 <input type='password' class='form-control' name='mdp' id='mdp'>
					 <i class='fa fa-eye active'></i>
				</div>
				
			<img class='rounded-circle' src='../uploads/".$q['picture']."' height='25%;'  width='30%;' alt='image'><br>
			<small>Votre nouvelle photo</small>
			<input type='file' id='file' name='photo'>    
	        <button align='right' style='margin:1rem;' class='btn btn-info text-white-50' type='submit'>Envoyer</button>
	 ";
	 echo $output;
	}
	 

 
 