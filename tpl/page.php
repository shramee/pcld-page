<?php
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js"></script>
<link rel="stylesheet" href="<?php echo PCLDPAGE ?>/assets/pcld-page.css?v=<?php echo PCLDPAGE_VER ?>">

<div id="slide1" class="slide">
	<div class="col-full">

		<i id="cloud1" class="fa fa-cloud"></i>
		<i id="cloud2" class="fa fa-cloud"></i>
		<i id="cloud3" class="fa fa-cloud"></i>
		<i id="cloud4" class="fa fa-cloud"></i>
		<i id="cloud5" class="fa fa-cloud"></i>

		<h1 data-center="margin: 5vh 0 0;" data-top-bottom="margin: 25vh 0 0;">Introducing Pootle Cloud</h1>
		<h3 data-center="margin: 5vh 0 0;" data-top-bottom="margin: 7vh 0 0;">Create and reuse template blocks on any website</h3>
		<img data-bottom="bottom: -0.2vh;" data-top-bottom="bottom: -16vh;left: 0vw;"
				 src="<?php echo PCLDPAGE ?>/assets/wilson.png">
		<img class="logo" src="https://www.pootlepress.com/wp-content/uploads/2017/06/pootlepress-logo-website.png" alt="PootlePress">
	</div>
</div>

<div id="slide2" class="slide">
	<div class="col-full" id="templates">
		<?php
		$tpls = Pootle_PB_Pootle_Cloud::pp_templates();
		foreach ( $tpls as $id => $tpl ) {
			if ( ! empty( $tpl['img'] ) ) {
				$delta = rand( 50, 160 );
				echo
					"<div class='ppb-tpl' " .
					"data-bottom-top='-webkit-transform: translateY({$delta}px);transform: translateY({$delta}px);' " .
					"data-center-top='-webkit-transform: translateY(0px);transform: translateY(0px);'>" .
					"<img src='$tpl[img]' alt='$id'>" .
					'<i class="fa fa-search"></i>' .
					'<i class="fa fa-close"></i>' .
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

		$tpls.imagesLoaded( function () {
			$tpls.masonry( {
				// options
				itemSelector: '.ppb-tpl',
			} );
			setTimeout( function () {
				ppbSkrollr.refresh();
			}, 250 )
		} );

		$( window ).resize( function () {
			ppbSkrollr.refresh();
		} );

		$tpls.on( 'click', '.ppb-tpl', function() {
			var $t = $( this );
			if ( $tpls.hasClass( 'showing-full' ) ) {
				$t = $tpls.find( '.show-full' );
				$t.attr( 'style', $t.data( 'style' ) );
				$t.css( 'z-index', 9 );
				$t.removeClass( 'show-full' );
				$tpls.removeClass( 'showing-full' );
				setTimeout( function () {
					$t.css( 'z-index', 0 );
				}, 700 );
			} else {
				$t.data( 'style', $t.attr( 'style' ) );
				$t.addClass( 'show-full' );
				$tpls.addClass( 'showing-full' );
				$t.css( 'top', Math.max( window.scrollY - $tpls.offset().top + 25, 25 ) );
			}
		} );
	} );
</script>
