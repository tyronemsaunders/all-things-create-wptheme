<?php

// Register scripts and stylesheets
require_once(get_stylesheet_directory().'/assets/functions/enqueue-scripts.php');

// Theme support options
require_once(get_stylesheet_directory().'/assets/functions/theme-support.php');

// register custom post types
require_once(get_stylesheet_directory().'/assets/functions/custom-post-types.php');

// register advanced custom fields
if ( ! defined( 'USE_LOCAL_ACF_CONFIGURATION' ) || ! USE_LOCAL_ACF_CONFIGURATION ) {
  require_once(get_stylesheet_directory().'/assets/functions/advanced-custom-fields.php');
}

// register nav menus
require_once(get_stylesheet_directory().'/assets/functions/navigation-menus.php');

// register site-nav functions
require_once(get_stylesheet_directory().'/assets/functions/site-nav.php');

// register timeline-nav functions
require_once(get_stylesheet_directory().'/assets/functions/timeline-nav.php');

// register timeline-sections functions
require_once(get_stylesheet_directory().'/assets/functions/timeline-sections.php');

// register timeline-floater functions
require_once(get_stylesheet_directory().'/assets/functions/timeline-floaters.php');

// register offcanvas news functions
require_once(get_stylesheet_directory().'/assets/functions/offcanvas-news.php');
