<?php
// Integrate menu with Bootstrap
require_once('vendor/salaros/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');

// Add post thumbnails support
add_theme_support('post-thumbnails');

// Add custom header
$args = array(
	'width'         => 100,
	'height'        => 50,
	'default-image' => get_template_directory_uri() . '/img/logo.png',
);
add_theme_support( 'custom-header', $args );

// Add menu
register_nav_menus(
	array(
		'main' => 'Menu principal',
		'footer' => 'Menu du bas'
	)
);

// Override admin style
function admin_custom_style(){
	//wp_register_style( 'webforce-admin', get_template_directory_uri() . '/admin/css/style.css' );
	wp_enqueue_style( 'webforce-admin', get_template_directory_uri() . '/admin/css/style.css' );
}
add_action('login_enqueue_scripts', 'admin_custom_style');
// Avantage du hook, on choisit où déclarer nos fonctions
//admin_custom_style();

// Register style
function custom_styles(){
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/vendor/components/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'style' );
}
add_action('wp_enqueue_scripts', 'custom_styles');

// Register script
function custom_scripts(){
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', get_template_directory_uri() . '/vendor/components/jquery/jquery.min.js', array(), false, true );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/vendor/components/bootstrap/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'bootstrap' );
	wp_register_script( 'script', get_template_directory_uri() . '/js/script.js', array(), false, true );
	wp_enqueue_script( 'script' );
}
add_action('wp_enqueue_scripts', 'custom_scripts');

function webforce_custom_init(){
	$args = array(
		'public' => true,
		'label' => 'Voitures',
		'has_archive' => true
	);
	register_post_type('voiture', $args);
	register_taxonomy(
		'marque',
		'voiture',
		array(
			'label' => __( 'Marque' ),
			'rewrite' => array( 'slug' => 'marque' ),
			'hierarchical' => true,
		)
	);
	flush_rewrite_rules();
}
add_action('init', 'webforce_custom_init');