<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-6 col-lg-offset-1">
			<h2 class="text-center"> Welcome on my website!</h2>
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="image/icon_code.png" alt="myProjectPicture">
						<div class="caption">
							<h3 class="text-center">My projects</h3>
							<p class="text-center"><a href="index.php?page=projects#menu" class="btn btn-primary" role="button">Read more</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="image/icon_camera.png" alt="myPhotoIcon">
						<div class="caption">
							<h3 class="text-center">My photos</h3>
							<p class="text-center"><a href="index.php?page=photos#menu" class="btn btn-primary" role="button">Read more</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="image/profile2.jpg" style="width: 128px; height: 128px;" alt="myPhoto">
						<div class="caption">
							<h3 class="text-center">About</h3>
							<p class="text-center"><a href="index.php?page=about#menu" class="btn btn-primary" role="button">Read more</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-success">
					  <div class="panel-heading">
					    <h3 class="panel-title">News</h3>
					  </div>
					  <div class="panel-body">
					    <?php
					    	foreach ($data as $news) {
					    		echo '<p>'.$news['text'].'</p>';
					    	}
					    ?>
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<a class="twitter-timeline" data-width="400" data-height="600" data-link-color="#078D65" href="https://twitter.com/A_Vauthey">Tweets by A_Vauthey</a>
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#li1').addClass('active');
	$('#li2').removeClass('active');
	$('#li3').removeClass('active');
	$('#li4').removeClass('active');
</script>