<?php
	include('connectionDB.php');
	$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
	if ($id!=0) erreur('error');
	$show_modal = false;
	session_start();
	include("view/header.html");
	include("view/menuBar.html");

	if (!empty($_GET['page']) && is_file('controller/'.$_GET['page'].'.php'))
	{
	    include 'controller/'.$_GET['page'].'.php';
	}
	else
	{
	    include 'controller/home.php';
	}
	include("view/footer.html");
		
	
?>
</div>
</body>
</html>
