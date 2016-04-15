<?php get_header() ?>
	<div class="container">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<h1><?php the_title() ?></h1>

				<?php the_terms($post->ID, 'marque') ?>

				<?php if(has_post_thumbnail()):
					$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0]; ?>
					<!--<img class="img-responsive" src="<?php echo $src ?>" alt="" />-->
					<div style="background: url(<?php echo $src ?>) 50% 50% no-repeat;height:400px"></div>
				<?php endif; ?>

				<?php if(get_post_meta($post->ID, 'couleur', true)): ?>
					<p>Couleur : <?php echo get_post_meta($post->ID, 'couleur', true) ?></p>
				<?php endif; ?>

				<?php if(get_post_meta($post->ID, 'prix', true)): ?>
					<p>Prix : <?php echo get_post_meta($post->ID, 'prix', true) ?></p>
				<?php endif; ?>

				<?php if(get_post_meta($post->ID, 'puissance', true)): ?>
					<p>Puissance : <?php echo get_post_meta($post->ID, 'puissance', true) ?></p>
				<?php endif; ?>

				<?php if(get_post_meta($post->ID, 'type_moteur', true)): ?>
					<p>Type moteur : <?php echo get_post_meta($post->ID, 'type_moteur', true) ?></p>
				<?php endif; ?>

				<div>
					<?php the_content() ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
<?php get_footer() ?>