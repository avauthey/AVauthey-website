<?php
	include("model/album.php");
	include("model/photo.php");
	$monUrl = $_SERVER['REQUEST_URI'];
	if(isset($_GET['nb']) && ($_GET['nb']) != '')
	{
		//include('connectionBD.php');
		$album = new Album($_GET['nb']);
		if($album -> getId() == ''){
			echo "</div>";
			echo '<div class="row">
				<div class="col-lg-12">
					<div class="col-md-4 col-md-offset-4">
						<img src="image/jackSparrow.gif"/>
						<p class="text-center textIncorrect"></br> This album does not exist </p>
						<p class="text-center"> Click <a href="index.php">here</a> to come back to the home page</p>
					</div>
				</div>
			</div>';
		}
		else{
			$query = $bdd -> prepare('SELECT * FROM Photo WHERE idAlbum = :id order by date desc');
		    $query -> bindValue(':id',$_GET['nb'], PDO::PARAM_INT);
		    $query -> execute();
		    $data = $query -> fetchAll();
			include("view/album.php");
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
	$('#li2').removeClass('active');
	$('#li3').addClass('active');
	$('#li4').removeClass('active');
</script>