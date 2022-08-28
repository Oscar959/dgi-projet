<?php 
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:../');
}
function replace($data)
{
	$rg = str_replace(' ', '%20', $data);
	return $rg;
}


if(isset($_POST['data'])){
	$search = $_POST['search'];
	$data = $_POST['data'];
	$output = "";
	if($data == "nif")
		{
			$nifs= json_decode(file_get_contents("http://oscarpaul.000webhostapp.com/nif/".$search));
			foreach($nifs as $nif)
			{
			  $output.= "
				 <tr>
					   <td>" . $nif->nif . "</td>
					   <td>" . $nif->forme_juridique . "</td>
					   <td>" . $nif->raisons_social . "</td>
					   <td style='width:30%;'>" . $nif->sigle . "</td>
					   <td style='width:20%'>" . $nif->siege_du_succurale . "</td>
					   <td>" . $nif->adresse . "</td>
					   <td>" . $nif->secteur_d_activite . "</td>
					   <td>" . $nif->etat_sociale . "</td>
					   <td>" . $nif->ancien_service_gestionnaire . "</td>
					   <td>" . $nif->nouveau_service_gestionnaire . "</td>
					   <td>" . $nif->ref_note_de_service . "</td>
				</tr>

			   "; 
		    }
		}else if($data == "nom")
		
		{
			$noms= json_decode(file_get_contents("http://localhost/dgi_project/api_diraf/nom/".$search));
			foreach($noms as $nom)
			{
			  $output.= "
				 <tr>
				    <td>" . $nif->nif . "</td>
					<td>" . $nif->forme_juridique . "</td>
					<td>" . $nif->raisons_social . "</td>
					<td style='width:30%;'>" . $nif->sigle . "</td>
					<td style='width:20%'>" . $nif->siege_du_succurale . "</td>
					<td>" . $nif->adresse . "</td>
					<td>" . $nif->secteur_d_activite . "</td>
					<td>" . $nif->etat_sociale . "</td>
					<td>" . $nif->ancien_service_gestionnaire . "</td>
					<td>" . $nif->nouveau_service_gestionnaire . "</td>
					<td>" . $nif->ref_note_de_service . "</td>
				 </tr>
			   "; 
		    }
		}else if($data == "sigle")
		
		{
			//$sigles = replace($sigles);
			$sigles = json_decode(file_get_contents("http://oscarpaul.000webhostapp.com/sigle/".$search));
			foreach($sigles as $sigle)
			{
			  $output.= "
				 <tr>
				    <td>" . $sigle->nif . "</td>
					<td>" . $sigle->forme_juridique . "</td>
					<td>" . $sigle->raisons_social . "</td>
					<td style='width:30%;'>" . $sigle->sigle . "</td>
					<td style='width:20%'>" . $sigle->siege_du_succurale . "</td>
					<td>" . $sigle->adresse . "</td>
					<td>" . $sigle->secteur_d_activite . "</td>
					<td>" . $sigle->etat_sociale . "</td>
					<td>" . $sigle->ancien_service_gestionnaire . "</td>
					<td>" . $sigle->nouveau_service_gestionnaire . "</td>
					<td>" . $sigle->ref_note_de_service . "</td>
				 </tr>
			   "; 
		    }
		}
		

}

echo $output;  			
?>		