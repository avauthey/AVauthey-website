<?php
	include('connectionDB.php');
	session_start();
	include("view/header.html");
	if (isset($_SESSION['id']))
	{
	    $query=$bdd->prepare('SELECT * FROM User WHERE id = :id');
	    $query->bindValue(':id',$_SESSION['id'], PDO::PARAM_STR);
	    $query->execute();
	    $answer=$query->fetch();
	    if ($answer !== FALSE)
	    {
	       $connect = 1;
	    }
	    else
	    {
	        $connect = 0;
	    }
	}
	else
	{
	    $connect = 0;
	}
	
	if($connect ==1)
	{
		/*include('model/User.php');
		$user = new User($_SESSION['id']);*/
		include("view/menuBarUser.html");
		if (!empty($_GET['page']) && is_file('controller/'.$_GET['page'].'.php'))
		{
		    include 'controller/'.$_GET['page'].'.php';
		}
		else
		{
		    include 'controller/homeUser.php';
		}
		

	}
	else{
		echo "</div>";
		echo '<div class="row">
				<div class="col-lg-12">
					<div class="col-md-4 col-md-offset-4">
						<img src="image/jackSparrow.gif"/>
						<p class="text-center" id="textIncorrect"></br> You are not allowed in this section </p>
						<p class="text-center"> Click <a href="index.php">here</a> to come back to the home page</p>
					</div>
				</div>
			</div>';
	}
	include("view/footer.html");
?>