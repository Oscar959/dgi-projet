<?php 


session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login.php');
}


   include('../conn.php');
   $query1="select* from members where statut='1'";
   $row=mysqli_query($con, $query1);
   $output="";
   while($res=mysqli_fetch_array($row)){
	 $output.="
     <tr>
       <td>".$res['nom']."</td>
       <td>".$res['prenom']."</td>
	   <td>".$res['profession_actuelle']."</td>
       <td>".$res['qualite_demande']."</td>
	   <td>
	      <div class='col-md-12'>
		    <div class='row'>
			  <div class='col-md-4'>
			    <button id=".$res['id']." class='btn btn-info supprimer responsive' style='font-style:italic; text-transform:capitalize;'><i class='fa fa-trash'></i></button>
			  </div>
			  
			   <div class='col-md-4'>
			     <button id=".$res['id']." class='btn btn-danger banir responsive' style='font-style:italic; text-transform:capitalize;'><i class='fa fa-ban'></i></button>
			  </div>
			</div>
		  </div>
	   </td>
     </tr>
   "; 
   }
   echo $output;
?>		