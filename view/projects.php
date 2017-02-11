<div class="row">
	<div class="col-md-12">
		<h2 class="text-center"> My projects </h2>
		<div class="col-md-8 col-md-offset-2">
			<?php
				foreach ($data as $projectd) {
					echo '<div class="col-sm-6">
							<div class="thumbnail">
								<img src="'.$projectd["logoEmployee"].'" style="width: auto; height: 160px;" alt="...">
								<div class="caption">
									<h3 class="text-center">'.$projectd["title"].'</h3>
									<h4 class="text-center">'.$projectd["type"].'</h4>
									<p class="text-center"><a href="index.php?page=project&nb='.$projectd["id"].'#menu" class="btn btn-primary" role="button">Read more</a></p>
								</div>
							</div>
						</div>'
					;
				}
			?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#li1').removeClass('active');
	$('#li2').addClass('active');
	$('#li3').removeClass('active');
	$('#li4').removeClass('active');
</script>