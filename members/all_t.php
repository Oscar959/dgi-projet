<?php
		$output="";
		if(isset($_POST['data']))
		{
			// I AM REQUESTING THE API IN ORDER TO GET ALL THE CONTENT OF THR API
			if($_POST['data']=="all")
			{
				$noms= json_decode(file_get_contents("http://oscarpaul.000webhostapp.com/all"));
				foreach($noms as $nom)
				{
				  $output.= "
					 <tr>
					   <td>" . $nom->nif . "</td>
					   <td>" . $nom->forme_juridique . "</td>
					   <td>" . $nom->raisons_social . "</td>
					   <td style='width:30%;'>" . $nom->sigle . "</td>
					   <td style='width:20%'>" . $nom->siege_du_succurale . "</td>
					   <td>" . $nom->adresse . "</td>
					   <td>" . $nom->secteur_d_activite . "</td>
					   <td>".$nom->etat_sociale. "</td>
					   <td>" . $nom->ancien_service_gestionnaire . "</td>
					   <td>".$nom->nouveau_service_gestionnaire. "</td>
					   <td>" . $nom->ref_note_de_service . "</td>
					 </tr>
					 </br>
				   "; 
				}
			}
			
		}else if(isset($_POST['id']))
			{
				$noms= json_decode(file_get_contents("http://localhost/dgi_project/api_diraf/all"));
				foreach($noms as $nom)
				{
				  $output.="
					<table  class='table' bordered='1'>
						<tr>
							<th>NIF</th>
							<th>NOM</th>
							<th>SIGLE</th>
							<th>ADRESSE</th>
							<th>ACTIVITITE</th>
							<th>SERVICE GESTIONNAIRE</th>
							<th>FORME JURIDIQUE</th>
							<th>ETAT SOCIETE</th>
						</tr>
						<tr>
						<td>".$nom->nif."</td>
						<td>".$nom->nom."</td>
						<td>".$nom->sigle."</td>
						<td style='width:30%;'>".$nom->adresse."</td>
						<td style='width:20%'>".$nom->activity."</td>
						<td>".$nom->service_gest."</td>
						<td>".$nom->form_juridique."</td>
						<td>".$nom->etat_societé."</td>
						</tr>
					</table>
						</br>
					"; 
				}

				//header("Content-Type:application/xls");
				header("Content-Type:application/pdf");
				header("Content-Disposition:attachment; filename=rapport.pdf");
			}
		echo $output;
