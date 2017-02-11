<div class="row">
	<div class="col-md-12">
		<div class="row">
			<a href="index.php?page=photos#menu" class="thumb"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back </a>
			<h2 class="text-center"> My photos from <?php echo $album -> getTitle();?></h2>
		</div></br>
		<div class="col-md-8 col-md-offset-2">
				<?php 
					$i = 0;
					$length = count($data);
					$j = 0;
					foreach ($data as $picture) {
						$i = $i + 1;
						$j = $j + 1;
						if ($i == 1)
						{
							echo '<div class="row">';
						 } ?>
								<div class="col-lg-4">
									<?php
									$photo = new Photo($picture['id']);
									$date = date("d F Y", strtotime($photo -> getDate()));
									echo '
										<div id="mouv'.$photo -> getId().'">
											<div class="quit hidden" id="block'.$photo -> getId().'">
												<a href="" class="iconquit">
													<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
												</a>
											</div>
											<img src="'.$photo -> getUrl().'" style="width: 273px; height: 182px;" class="pic" id="'.$photo -> getId().'">
											<h6>'.$photo -> getTitle().' - '.$date.'</h6>
										</div>';?>
								</div>
					<?php
							if($i == 3 || $j == $length)
							{
								$i=0;
								echo '</div>';
							}
					}
				?>
		</div>
	</div>
</div></br>
<script type="text/javascript" src="js/album.js"></script> 