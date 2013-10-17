<div class="slider">

<script>
  $(function() {
    $(".rslides").responsiveSlides({
	  auto: true,
	  speed: 800,
	  timeout: <?php echo $time*1000; ?>,
	});
  });
  $(function() {
    $(".rslides2").responsiveSlides({
	  auto: true,
	  speed: 800,
	  timeout: <?php echo $time*500; ?>,
	});
  });
</script>


<ul class="rslides">

	<?php

	$nb_pics = 0;

	foreach($datas as $data)
	{
		$pics = get_pics($data->MAN_ID);

		if($pics != NULL)
		{
			$nb_pics++;
			?>

			<li>
				<div class="content">

					<h1><?php echo $data->MAN_TITRE; ?></h1>

					<p><b>Description :</b> <?php echo $data->MAN_DESCR; ?></p>
					<p><b>Ville : </b><?php echo $data->MAN_VILLE; ?></p>
					<p><b>Code Postal : </b><?php echo $data->MAN_CP; ?></p>
					<h2>Tarif : <?php echo $data->MAN_TARIF; ?> € </h2>
					<br>
					<h2>Images</h2>

					<ul class="rslides2">
					<?php
					foreach($pics as $pic)
					{
						?>
						<li><img src="http://ns366377.ovh.net/~giraud/immo/photos/Z<?php echo $pic->PHO_SRC; ?>" alt="<?php echo $data->MAN_TITRE; ?>"></li>
						<?php
					}
					?>
					</ul>
					<br>
				</div>

			</li>
			<?php
		}
	}
	?>

</ul>

</div>


<?php $timer = ($nb_pics * (1000*$time)); ?>


<script type="text/javascript">

	$(document).ready(function() {

		setInterval(function() {

			$.ajax({
			  type: 'POST',
			  url: 'http://ns366377.ovh.net/~hagege/immo/controllers/reload.php',
			  data: {
			  	action: 'reload',
			  	agence: <?php echo $agence; ?>,
			  	time: <?php echo $time; ?>,
			  }
			}).done(function(print) {
				    $( ".slider" ).html(print);
				});

		}, <?php echo $timer; ?>);

	});

</script>