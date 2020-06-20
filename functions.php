<?php

// inject titles dynamically (let WP handle titles by removing <title/> from header.php)
function testing_theme_support() {
	// requires wp_head(); to be in header.php
	add_theme_support('title-tag');
}

function testing_register_styles() {
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('testing-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
	wp_enqueue_style('testing-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '4.5.0', 'all');
}

function testing_register_scripts() {
	$version = wp_get_theme()->get('Version');

	// true = put it in the footer when wp_enqueue_scripts is called
	wp_enqueue_script('testing-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
	wp_enqueue_script('testing-jquery', "https://code.jquery.com/jquery-3.5.1.slim.min.js", array(), '1.0', true);
	wp_enqueue_script('testing-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.0', true);
	wp_enqueue_script('testing-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js", array(), '1.0', true);
}

function testing_menus() {
	$location = array(
		'primary' => 'Desktop Primary Left Sidebar',
		'footer' => 'Footer Menu Items'
	);
	register_nav_menus($location);
}

function register_navwalker() {
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	// after this is loaded you need to register a nav menu (see ./header.php)
}


add_action('after_setup_theme', 'testing_theme_support');
add_action('wp_enqueue_scripts', 'testing_register_styles');
add_action('wp_enqueue_scripts', 'testing_register_scripts');
add_action('init', 'testing_menus');
add_action( 'after_setup_theme', 'register_navwalker' );

?>