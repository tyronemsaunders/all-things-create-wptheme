<?php
function register_atc_nav_menus() {
  register_nav_menus(
    array(
      'timeline-navigation' => __('Timeline Navigation'),
      'site-navigation' => __('Site Navigation')
    )
  );
}
add_action('init', 'register_atc_nav_menus');
