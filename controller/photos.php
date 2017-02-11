<?php
	$query = $bdd -> prepare('SELECT * FROM Album order by date desc');
    $query -> execute();
    $data = $query -> fetchAll();
    include('model/Album.php');
	include("view/photos.php");
	unset($_SESSION['result']);
?>