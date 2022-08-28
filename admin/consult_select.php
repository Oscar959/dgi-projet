<?php 
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login');
}

   include('../conn.php');
   $query1="select* from consultation";
   $row=mysqli_query($con, $query1);
   $output="";
   while($res=mysqli_fetch_array($row)){
	 $output.="
     <tr>
       <td>".$res['nom']."</td>
       <td>".$res['prenom']."</td>
	   <td>".$res['phone']."</td>
   	   <td style='width:30%;'>".$res['message']."</td>
	     <td style='width:20%'>".$res['adresse']."</td>
	     <td>".$res['date_pub']."</td>
	   <td>
	      <div class='col-md-12'>
		    <div class='row'> 
			  <div class='col-md-6'>
			     <button id=".$res['id']." class='btn btn-danger rejected' style='font-style:italic; text-transform:capitalize;'><i class='fa fa-trash'></i></button>
			  </div>
			</div>
		  </div>
	   </td>
     </tr>
   "; 
   }
   echo $output;
?>		