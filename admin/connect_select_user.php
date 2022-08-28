<?php
include("../conn.php");
include("../connect.php");
$message="";
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:..');
}


if(isset($_POST['select'])){
	$row = $connect->query("select m.id, name, firstname, picture from members as m inner join is_connected as i on m.id = i.members_id");
	while($res=$row->fetch()){	
	$name= $res['name'];
	$firstname= $res['firstname'];
	$pic= $res['picture'];
	$id= $res['id'];
	$message='
     <tr>
       <td>'.$name.'</td>
       <td>'.$firstname.'</td>
	   <td><img class="rounded-circle" src="../uploads/'.$pic.'" width="100px;" height="90px;" class="img-profile rounded-circle"; alt="image"></td>
	   <td>
	      <div class="col-md-12">
		    <div class="row">
			  <div class="col-md-6">
			    <a href=localisation?user_location_by_name='.$id.'><button id='.$id.' class="btn btn-info approved" style="font-style:italic; padding:10px; margin:0.5rem; margin-left:0.5rem;  text-transform:capitalize;">Localiser</button></a>
			  </div>
			</div>
		  </div>
	   </td>
     </tr>
   '; 
  }
	
}
    $data= array(
	   'notif'               =>$message 
	);

echo json_encode($data);
?>