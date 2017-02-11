<?php
	include("model/project.php");
	$monUrl = $_SERVER['REQUEST_URI'];
	if(isset($_GET['nb']) && ($_GET['nb']) != '')
	{
		//include('connectionBD.php');
		$project = new Project($_GET['nb']);
		if($project -> getId() == ''){
			echo "</div>";
			echo '<div class="row">
				<div class="col-lg-12">
					<div class="col-md-4 col-md-offset-4">
						<img src="image/jackSparrow.gif"/>
						<p class="text-center textIncorrect"></br> This project does not exist </p>
						<p class="text-center"> Click <a href="index.php">here</a> to come back to the home page</p>
					</div>
				</div>
			</div>';
		}
		else{
			include("view/project.php");
		}	
	}
	else{
		echo "</div>";
			echo '<div class="row">
					<div class="col-lg-12">
						<div class="col-md-4 col-md-offset-4">
							<img src="image/jackSparrow.gif"/>
							<p class="text-center textIncorrect"></br> You are not allowed in this section </p>
							<p class="text-center"> Click <a href="index.php">here</a> to come back to the home page</p>
						</div>
					</div>
				</div>';
	}
	
?>
<script type="text/javascript">
	$('#li1').removeClass('active');
	$('#li2').addClass('active');
	$('#li3').removeClass('active');
	$('#li4').removeClass('active');
</script>