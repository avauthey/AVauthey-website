<div class="row">
	<div class="col-md-12">
		<a href="index.php?page=projects#menu" class="thumb"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back </a>
		<h2 class="text-center"> <?php echo $project -> getTitle(); ?></h2>
		<h3 class="text-center nameCompany"> <?php echo $project -> getType(); ?></h2>
		<div class="col-md-8 col-md-offset-2">
			<p class="text-center nameCompany">
			<img src="<?php echo $project -> getLogoEmployee();?>" style="width: 160px;"> 
			<?php
				$dateDeb = date("d-m-Y", strtotime($project -> getDateDeb()));
				$dateFin = date("d-m-Y", strtotime($project -> getDateFin()));
				echo $project -> getEmployee().' ['.$dateDeb.'] - ['.$dateFin.']';?></p></br>
			</br>
			<?php echo $project -> getText().'</br>';
			if ($project -> getPhoto() != '' && $project -> getPhoto() != null) {?>
			<p class="text-center"><img src="<?php echo $project -> getPhoto();?>" style="width: 800px;"></p><?php } ?></br>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#li1').removeClass('active');
	$('#li2').addClass('active');
	$('#li3').removeClass('active');
	$('#li4').removeClass('active');
</script>