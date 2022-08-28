<?php
include("../conn.php");
include("../connect.php");
$message="";
$output= "";	
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:..');
}


if(isset($_POST['action'])){
	$retour=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) AS nbre_connectes  FROM is_connected "));
	 if($retour['nbre_connectes']==0){
		$output='Aucun membre connecté';	
	 }else{
		$output='Il y a actuellement '.$retour['nbre_connectes'].' visiteurs';
	 }

}else if(isset($_POST['select'])){
	$row = "select name, firstname, picture 
	         from members as m 
             inner join is_connected as i 
			 on m.id = i.members_id";
	while($res=mysqli_fetch_array($row)){
	
	$message = "
     <tr>
       <td>".$res['name']."</td>
       <td>".$res['firstname']."</td>
	   <td><img class='rounded-circle' src='../uploads/".$res['picture']." class='img-profile picture'; alt='image'></td>
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


   

	
}
    $data= array(
	   'notification'         =>$output,
	   'messages'             =>$message 
	);

echo json_encode($data);
?>