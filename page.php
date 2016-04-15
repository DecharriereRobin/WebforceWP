<?php get_header() ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<h1><?php the_title() ?></h1>
				<?php if(has_post_thumbnail()):
					$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>
					<img src="<?php echo $src ?>" alt="" />
				<?php endif; ?>
				<div>
					<?php the_content() ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
<?php get_footer() ?>