<?php get_header(); ?>
		<?php //Format chaine ou tableau ?>
		<?php //query_posts('posts_per_page=2&cat=2'); ?>
		<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
		<?php query_posts(array(
			'posts_per_page' => 2,
			'showposts' => 2,
			'paged' => $paged
		)); ?>
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<h1><?php the_title(); ?></h1>
				<?php the_category(', ') ?>
				<?php echo get_the_date(); the_time() ?>
				<div>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<?php next_posts_link('Suivant'); previous_posts_link('Précédent') ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

		<?php $my_query = new WP_Query(array('post_type' => 'page', 'showposts' => 2, 'posts_per_page' => 2, 'paged' => $paged));
		while($my_query->have_posts()): $my_query->the_post();

			the_title();
			the_content();

		endwhile;
		next_posts_link('Suivant', $my_query->max_num_pages); previous_posts_link('Précédent');
		wp_reset_postdata(); ?>

		<?php //$posts = get_posts(); ?>
		<?php //print_r($posts); ?>
<?php get_footer(); ?>