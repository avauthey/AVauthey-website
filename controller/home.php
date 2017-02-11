<?php
	$query = $bdd -> prepare('SELECT * FROM News order by id desc limit 10');
    $query -> execute();
    $data = $query -> fetchAll();
	include('view/home.php');
	unset($_SESSION['result']);
?>