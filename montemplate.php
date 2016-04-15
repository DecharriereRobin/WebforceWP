<?php
/*
Template Name: Mon template
*/
get_header() ?>
		<div class="container">
		<?php if (have_posts()) : ?>
			<div class="row">
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-6">
					<h1><?php the_title() ?></h1>
					<?php if(has_post_thumbnail()):
						$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>
						<img src="<?php echo $src ?>" alt="" />
					<?php endif; ?>
				</div>
				<div class="col-md-6">
					<?php the_content() ?>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
		</div>
<?php get_footer() ?>