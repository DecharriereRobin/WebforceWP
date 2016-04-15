<?php get_header() ?>
	<div class="container">
		<?php if (have_posts()) : $count = 1; $total = $wp_query->post_count; $display = 6; ?>
			<?php while (have_posts()) : the_post(); ?>
				<?php if($count==1 || ($count-1)%$display == 0): ?>
					<div class="row">
				<?php endif; ?>
				<div class="col-md-<?php echo 12/$display ?>">
					<?php the_terms($post->ID, 'marque') ?>
					<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
					<div><?php the_content() ?></div>
				</div>
				<?php if($count%$display == 0 || $count == $total): ?>
					</div>
				<?php endif; ?>
				<?php $count++; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer() ?>