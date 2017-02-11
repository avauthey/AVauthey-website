<?php
	$val1 = rand(1,50);
	$val2 = rand(1,50);
	$result = $val1 + $val2;
	if(!isset($_SESSION['result'])){
	  $_SESSION['result'] = $result;
	}
	include('view/contact.php');
?>