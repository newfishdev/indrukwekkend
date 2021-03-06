<div id="overlay-cases" class="hidden">
	<div class="container">
		<div class="row pb-3 pt-5">
			<div class="col-12 text-right">
				<div id="overlay-cases-close">
					<span class="text-orange">sluiten</span><span class="icon close-orange ml-3"></span>
				</div>
			</div>
		</div>
		<div class="row">
		<?php $args = array('post_type' => 'cases', 'post__not_in' => array($post->ID), ); ?>
			<?php $query = new wp_query( $args ); ?>
			<?php if($query->have_posts()): ?>
				<?php while( $query->have_posts() ) : ?>
					<?php $query->the_post(); ?>
						<div class="col-6 col-md-4 col-lg-3 overlay-case">
							<div class="overlay-case-content">
								
								
								<?php $image = get_field('header_foreground') ?>
									<?php 
										$thumb = $image['sizes'][ 'overlay-land' ]; 
										$alt = $image['alt'];
									?>
									
								<div class="overlay-case-image" style="background-image:url(<?= $thumb ?>);"></div>
								
								
								
								<div class="overlay-case-title">
									<h4><?php the_title(); ?></h4>
								</div>
								<a class="overlay-case-hover" href="<?php echo esc_url( get_post_permalink() ); ?>">
									<div class="overlay-title">
										<h4 class="text-white"><?php the_title(); ?></h4>
										<hr>
										<span class="text-white">
											<?php
											$tags = get_the_tags();
											$total_tags = count($tags);
											$i=0;
											if($tags && ($total_tags > 1) ):
												foreach($tags as $tag):
													$i++;
													echo $tag->name;
													if($i < ($total_tags - 1) ):
														echo ', ';
													elseif($i < ($total_tags) ):
														echo " en ";
													endif;
												endforeach;
											else:
												if($tags):
													foreach($tags as $tag):
														echo $tag->name;
													endforeach;
												endif;
											endif;
											?>
										</span>
									</div>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<?php wp_reset_query(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>