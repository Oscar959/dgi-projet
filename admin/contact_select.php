<?php 
   include('../conn.php');
   $query1="select* from contact_us";
   $row=mysqli_query($con, $query1);
   $output="";
   while($res=mysqli_fetch_array($row)){
	 $output.="
     <tr>
       <td>".$res['nom']."</td>
       <td>".$res['prenom']."</td>
	   <td>".$res['email']."</td>
       <td>".$res['subject']."</td>
       <td>".$res['message']."</td>
       <td>".$res['date_pub']."</td>
	   <td>
	      <div class='col-md-12'>
		    <div class='row'>
			  <div class='col-md-3'>
			     <button id=".$res['id']." class='btn btn-danger rejected responsive' style='font-style:italic; padding:10px; margin:0.5rem; text-transform:capitalize;'><i class='fa fa-trash'></i></button>
			  </div>
			</div>
		  </div>
	   </td>
     </tr>
   "; 
   }
   echo $output;
?>		