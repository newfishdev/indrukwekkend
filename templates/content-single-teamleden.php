<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('templates/teamleden/single', 'intro'); ?>

<?php // Teamlid Contact?>
<?php get_template_part('templates/teamleden/teamleden', 'contact'); ?>


<?php // Content ?>
<?php if( have_rows('content') ): ?>
<div class="row single-content">
<div class="container">
<?php while( have_rows('content') ): the_row(); ?>

<?php if( get_row_layout() == 'image_left' ): ?>
<?php // Align image to left ?>
<?php get_template_part('templates/parts/image', 'left'); ?>

<?php elseif(get_row_layout() == 'image_right' ): ?>
<?php // Align image to right ?>
<?php get_template_part('templates/parts/image', 'right'); ?>

<?php elseif(get_row_layout() == 'image_fullwidth' ): ?>
<?php // Span image over container ?>
<?php get_template_part('templates/parts/image', 'fullwidth'); ?>

<?php elseif(get_row_layout() == 'image_multi' ): ?>
<?php // Span image over container ?>
<?php get_template_part('templates/parts/image', 'multi'); ?>

<?php endif; ?>

<?php endwhile; ?>

</div>
</div>

<?php // Social Media ?>
<?php get_template_part('templates/teamleden/teamleden', 'socialmedia'); ?>

<?php endif; ?>
<?php endwhile; ?>