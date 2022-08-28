<?php
session_start();	
if(!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])){
	header('location:login');
}


if(isset($_GET['file'])){
	$fileName=basename($_GET['file']);
	$filePath="../doc/".$fileName;
		header("Content-Description:File Transfer");
	    header("Content-Type:application/pdf; application/vnd.openxmlformats-officedocument.wordprocessingml.document");
		header("Content-Disposition:attachment; filename=$fileName");
		header("Content-Transfer-Encoding:binary");
		header("Cache-Control:private");
		readfile($filePath);
		exit;
}else if(isset($_GET['files'])){
	$fileName=basename($_GET['files']);
	$filePath="../lettres/".$fileName;
		header("Content-Description:File Transfer");
	    header("Content-Type:application/pdf");
		header("Content-Disposition:attachment; filename=$fileName");
		header("Content-Transfer-Encoding:binary");
		header("Cache-Control:private");
		readfile($filePath);
		exit;
}else{
	echo "le fichier n'existe pas ";
}

?>