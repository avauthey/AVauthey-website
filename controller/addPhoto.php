<?php
	include('model/Album.php');
	$query = $bdd -> prepare('SELECT * FROM Album order by date desc');
    $query -> execute();
    $data = $query -> fetchAll();
	include('view/addPhoto.php');
?>