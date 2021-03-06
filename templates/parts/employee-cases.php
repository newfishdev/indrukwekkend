<?php if( $post_objects = get_field('cases') ): ?>
	<div class="row justify-content-center mb-6 mt-5 part-employee-cases">
		<div class="col-12 col-lg-10">
			<div class="row justify-content-center">
	
				<div class="col-12 col-xl-6 text-right order-2 order-xl-1">
					<div class="row employee-cases-list">
						
							<?php foreach( $post_objects as $post): ?>
	
								<?php setup_postdata($post); ?>
	
									<div class="employee-cases-content">
										
									<?php $image = get_field('header_foreground') ?>
									<?php 
										$thumb = $image['sizes'][ 'overlay-land' ]; 
										$alt = $image['alt'];
									?>
								
										
										<div class="employee-cases-image" style="background-image:url(<?= $thumb ?>);"></div>
										<div class="employee-cases-title">
											<?php the_title(); ?>
										</div>
										<a class="employee-cases-hover" href="<?php echo esc_url( get_post_permalink() ); ?>">
											<div class="hover-title">
												<span class="text-white"><?php the_title(); ?></span>
											</div>
										</a>
									</div>
	
								<?php endforeach; ?>
	
							<?php wp_reset_postdata(); ?>
	
	
					</div>
				</div>
	
				<div class="col-12 col-md-11 col-xl-6 text-right order-1 order-xl-2 mb-5 mb-xl-0">
					<div class="heading">
						<h4 class="title">
							<span><?php echo preg_replace('~((\w+\s){2})~', '$1' . "<br>", get_field('cases_title')); ?></span>
						</h4>
						<span class="line"></span>
					</div>
				</div>
	
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="row mt-5 part-employee-cases">
	</div>
<?php endif; ?>