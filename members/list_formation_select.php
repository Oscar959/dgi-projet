<?php 
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login');
}

   include('../conn.php');
   $query1="select* from membres_form where statut='0'";
   $row=mysqli_query($con, $query1);
   $output="";
   while($res=mysqli_fetch_array($row)){
	 $output.="
     <tr>
       <td>".$res['nom']."</td>
       <td>".$res['prenom']."</td>
	   <td><img class='rounded-circle' src='../uploads/".$res['photo']."' height='55%;'  width='55%;' class='img-profile picture'; alt='image'></td>
	   <td>
	      <div class='col-md-12'>
		    <div class='row'>
			  <div class='col-md-6'>
			    <button id=".$res['id']." class='btn btn-info approved' style='font-style:italic; padding:10px; margin:0.5rem; margin-left:0.5rem;  text-transform:capitalize;'>Accepter</button>
			  </div>
			</div>
		  </div>
	   </td>
     </tr>
   "; 
   }
   echo $output;
?>		