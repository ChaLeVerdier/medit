<?php

/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */

 
function oceanwp_child_enqueue_parent_style()
{
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme('OceanWP');
	$version = $theme->get('Version');
	// Load the stylesheet
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('oceanwp-style'), $version);
}


/**
* Ajoute le bouton "Nous contacter" à la fin du menu
*/

function add_contact_button_to_menu($items, $args) {
	$button = '<div class="contact-btn-wrapper">' . do_shortcode('[contact]') . '</div>';
	$items .= '<li class="menu-item menu-item-contact">' . $button . '</li>';
	return $items;
  }

  
/**
* Shortcode pour générer le bouton de contact
*/
function generate_contact_button() {
	return '<a href="/contact" class="contact-btn">Nous contacter</a>';
  }


function enqueue_custom_scripts() {
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/scripts/script.js', array('jquery'), '1.0', true);
     // Le paramètre array('jquery') indique que ce script dépend de jQuery.
}
 
add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');
add_filter('wp_nav_menu_items', 'add_contact_button_to_menu', 10, 2);
add_shortcode('contact', 'generate_contact_button');
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');