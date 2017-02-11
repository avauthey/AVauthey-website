<?php
	
	include("model/project.php");
	//include('connectionBD.php');
	global $bdd;
	$query = $bdd -> prepare('SELECT * FROM Project order by dateDeb');
    $query -> execute();
    $data = $query -> fetchAll();
    include("view/projects.php");
    unset($_SESSION['result']);
?>