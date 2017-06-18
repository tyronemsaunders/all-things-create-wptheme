<?php
  function all_things_create_site_scripts() {
    $parent_style = 'site-css';
    // enqueue the parent theme stylesheet
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/assets/css/style.css');

    // enqueue the atc theme stylesheet
    wp_enqueue_style('font-awesome-style',
      get_stylesheet_directory_uri() . '/assets/css/font-awesome.css',
      [],
      wp_get_theme()->get('Version')
    );

    // enqueue the atc theme stylesheet
    wp_enqueue_style('atc-style',
      get_stylesheet_directory_uri() . '/assets/css/style.css',
      array($parent_style),
      wp_get_theme()->get('Version')
    );

    // Adding scripts file in the footer
    wp_enqueue_script('atc-site-js',
      get_stylesheet_directory_uri() . '/assets/js/scripts.js',
      array('jquery'),
      wp_get_theme()->get('Version'),
      true);
  }

add_action('wp_enqueue_scripts', 'all_things_create_site_scripts');
