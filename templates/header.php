<?php
$background = function ( $url ) {
	$url = ($url) ? $url : get_stylesheet_directory_uri() . "/dist/images/header_default.jpg";
	echo 'style="background-image: url(' . esc_url( $url ) . ');"';
};

$display = function ( $url ) {
	if ($url != ''){echo 'd-none';}
};

$header_video = function(){
	if($video_url = get_field('header_video') ){
		preg_match('#(?:https?://)?(?:www.)?(?:player.)?vimeo.com/(?:[a-z]*/)*([0-9]{6,11})[?]?.*#', $video_url, $array);
		return $array[1];
	}

};

?>
<div id="back-to-top" class="hide">
	back to top
</div>

<nav class="nav-mobile">
	<?php if ( has_nav_menu( 'primary_navigation' ) ) :?>
		<?php wp_nav_menu( ['theme_location' => 'primary_navigation','menu_class' => 'nav'] );?>
	<?php endif; ?>
</nav>

<!-- header in templates -->
<header class="jumbotron banner" <?php $background( get_field('header_background') ); ?>>
	<div class="row">
		<div class="col-lg-12">
			<div class="container navigation">

				<div class="row align-items-center align-items-lg-start">

					<div class="col-10 col-lg-4">
						<a class="brand" href="<?= esc_url(home_url('/')); ?>">
							<div class="brand-logo"></div>
						</a>
					</div>

					<div class="col-2 d-lg-none text-center">
						<a href="#modal-login" class="h5" ><i class="fa fa-lock"></i></a>
					</div>

					<div class="col-12 col-md-9 col-lg-8 d-none d-lg-block p-0">
						<nav class="nav-primary">
							<?php if ( has_nav_menu( 'primary_navigation' ) ) :?>
								<?php wp_nav_menu( ['theme_location' => 'primary_navigation','menu_class' => 'nav'] );?>
							<?php endif; ?>
						</nav>
					</div>

				</div>
			</div>
		</div>
	</div>

	<?php if( have_rows('headlines') && !$header_video() ): ?>

	<div class="row">
		<div class="container banner-holder">

			<div class="row align-items-end banner-content">
				<!-- written content -->
				<div class="col-12 col-md-6 order-2 order-md-1 ">

					<div id="headlines-collect">
						<?php while( have_rows('headlines') ): the_row(); ?>
							<?php $lines = get_sub_field('lines');?>
							<p>
								<span class="h3 text-orange"><?php echo $lines['line_orange'];?></span><br/>
								<span class="h4"><?php echo $lines['line_black'];?></span>
							</p>

						<?php endwhile; ?>
					</div>
					<div class="headlines">
						<span id="headlines-typed"></span>
					</div>

					<div class="buttons mb-5 mt-4 mb-xl-6">

							<?php if (is_page( 'contact' )): ?>
								<a class="btn btn-lg btn-primary btn-arrow arrow-right mr-2" href="https://www.google.com/maps/dir/Current+Location/Indrukwekkend,+De+Droogmakerij+20f,+1851+LX+Heiloo" target="_blank">
									Google de route</a>

							<?php elseif (is_home() || is_front_page()): ?>
								<a class="btn btn-lg btn-primary btn-arrow arrow-right mr-2" href="#vacatures">
									Kom bij ons werken	</a>
								<a class="btn btn-lg btn-black" href="#cases">
									Bekijk ons werk</a>

							<?php endif;?>
						</div>
					</div>

					<?php if($image = get_field('header_foreground') ): ?>
						<?php
							$thumb = $image['sizes'][ 'header-land' ];
							$alt = $image['alt'];
						?>
						<!-- image content -->
						<div class="col-12 col-md-9 col-xl-6 order-1 order-md-2 foreground-image">
							<img class="img-fluid float-right" src="<?php echo $thumb; ?>" alt="<?= $alt; ?>"  />
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if( $header_video() ):?>
		<div class="header-video">
			<div class="container headlines-holder">

				<div id="headlines-collect">
					<?php while( have_rows('headlines') ): the_row(); ?>
						<?php $lines = get_sub_field('lines');?>
						<p>
							<span class="h3 text-orange"><?php echo $lines['line_orange'];?></span><br/>
							<span class="h4"><?php echo $lines['line_black'];?></span>
						</p>

					<?php endwhile; ?>
				</div>
				<div class="headlines">
					<span id="headlines-typed"></span>
				</div>

				<div class="buttons mb-5 mt-4 mb-xl-6">

						<?php if (is_page( 'contact' )): ?>
							<a class="btn btn-lg btn-primary btn-arrow arrow-right mr-2" href="https://www.google.com/maps/dir/Current+Location/Indrukwekkend,+De+Droogmakerij+20f,+1851+LX+Heiloo" target="_blank">
								Google de route</a>

						<?php elseif (is_home() || is_front_page()): ?>
							<a class="btn btn-lg btn-primary btn-arrow arrow-right mr-2" href="/over-ons">
								Leer ons kennen	</a>
							<a class="btn btn-lg btn-black" href="#cases">
								Bekijk ons werk</a>

						<?php endif;?>
					</div>
				</div>
			<div class="video-wrap">
				<iframe class="actual-video" src="https://player.vimeo.com/video/<?php echo $header_video(); ?>?title=0&byline=0&portrait=0&autoplay=1&loop=1&background=1" width="960" height="540" frameborder="0" data-ready="true"></iframe>
			</div>
		</div>
	<?php endif; ?>

	<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modal-login">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h5 class="modal-title" id="modal-login">Inloggen</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					
					
					
				</div>
				<div class="modal-body">

					<a href="<? the_field('webshop_url', 'option'); ?>" class="btn btn-sm btn-primary" target="_blank">Webshop</a>
					<a href="<? the_field('dataverkeer_url', 'option'); ?>" class="btn btn-sm btn-primary" target="_blank">Dataverkeer</a>

				</div>
			</div>
		</div>
	</div>
</header>