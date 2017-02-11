<div class="row">
	<div class="col-md-12">
		<h2 class="text-center"> My photos </h2></br>
		<div class="col-md-8 col-md-offset-2">
			<?php 
				foreach ($data as $alb) {
					$album = new Album($alb['id']);
					$date = date("F Y", strtotime($album -> getDate()));
					echo '<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
								<a href="index.php?page=album&nb='.$album -> getId().'#menu" class="thumb">
									<div class="seeMore">See more</div>
									<img src="'.$album -> getBaniere().'" alt="..." style="width: 500px; height:170px;">
									<h3 class="text-center">'.$album -> getTitle().'</h3>
								</a>
									<h5 class="text-center" style="color: grey;">'.$date.'</h5>
							</div>
						</div>
				';
				}
			?>
		</div>
	</div>
</div></br>
<script type="text/javascript">
	$('#li1').removeClass('active');
	$('#li2').removeClass('active');
	$('#li3').addClass('active');
	$('#li4').removeClass('active');
</script>