<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title('-', true, 'right'); bloginfo( 'title' ); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php bloginfo('url') ?>">
			      <?php if(get_header_image()!=""): ?>
			      		<img src="<?php header_image() ?>" alt="<?php bloginfo('title') ?>" />
			  	  <?php else: ?>
			  	  		<?php bloginfo('title') ?>
			  	  <?php endif; ?>
		  	  </a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<?php wp_nav_menu(array(
					'theme_location' => 'main',
					'menu_class' => 'nav navbar-nav',
					'walker' => new wp_bootstrap_navwalker()
				)); ?>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>