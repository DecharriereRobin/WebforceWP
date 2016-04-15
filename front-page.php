<?php get_header() ?>
		<?php $sliders = new WP_Query(array('post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC')); ?>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<?php while($sliders->have_posts()): $sliders->the_post(); ?>
		    	<li data-target="#carousel-example-generic" data-slide-to="<?php echo $sliders->current_post ?>" class="<?php if($sliders->current_post==0): ?>active<?php endif; ?>"></li>
			<?php endwhile; ?>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
			<?php while($sliders->have_posts()): $sliders->the_post(); ?>
			    <div class="item <?php if($sliders->current_post==0): ?>active<?php endif; ?>">
			      <?php if(has_post_thumbnail()):
						$src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>
						<div style="background: url(<?php echo $src ?>) 50% 50% no-repeat;height:400px"></div>
				  <?php endif; ?>
			      <div class="carousel-caption">
			        <?php the_title() ?>
			        <?php the_content() ?>
			      </div>
			    </div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
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