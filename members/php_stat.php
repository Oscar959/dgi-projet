<?php 
	if(isset($_POST['get_number']))
	{
		$stat = json_decode(file_get_contents("http://oscarpaul.000webhostapp.com/nbr"));
		ob_start();
		foreach ($stat as $id) {
			$stat_message = "Le saviez-vous? La DGI compte à ce jour $id->nombres_total_des_contribuables contribuables";
		}
		echo $stat_message;
	}
		   
?>