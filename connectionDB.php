<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=avauthey;charset=utf8', 'root', '');
	//echo 'ok';
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>