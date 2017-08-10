<?php
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js"></script>
<link rel="stylesheet" href="<?php echo PCLDPAGE ?>/assets/pcld-page.css">

<div id="slide1" class="slide">
	<div class="col-full">

		<i id="cloud1" class="fa fa-cloud"></i>
		<i id="cloud2" class="fa fa-cloud"></i>
		<i id="cloud3" class="fa fa-cloud"></i>
		<i id="cloud4" class="fa fa-cloud"></i>
		<i id="cloud5" class="fa fa-cloud"></i>

		<h1 data-bottom="margin: 5vh 0;" data-top-bottom="margin: 35vh 0;">Introducing Pootle Cloud</h1>
		<img data-bottom="bottom: -70px;" data-top-bottom="bottom: -2px;left: 0vw;"
				 src="<?php echo PCLDPAGE ?>/assets/wilson.png">
	</div>
</div>

<div id="slide2" class="slide">
	<div class="col-full" id="templates">
		<?php
		$tpls = Pootle_PB_Pootle_Cloud::get_templates();
		foreach ( $tpls as $id => $tpl ) {
			if ( ! empty( $tpl['img'] ) ) {
				echo
					"<div class='ppb-tpl' data-bottom-top='-webkit-transform: translateY(25%);transform: translateY(25%);' data-center='-webkit-transform: translateY(0%);transform: translateY(0%);'>" .
					"<img src='$tpl[img]' alt='$id'>" .
					"<h3>$id</h3>" .
					"</div>";
			}
		}
		?>
	</div>
</div>

<script>
	jQuery( function ( $ ) {
		var $tpls = $( '#templates' );

		$tpls.imagesLoaded( function() {
			$tpls.masonry( {
				// options
				itemSelector: '.ppb-tpl',
			} );
			ppbSkrollr.refresh();
		} );
	} );
</script>