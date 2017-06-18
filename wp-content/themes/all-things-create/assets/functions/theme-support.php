<?php
function atc_theme_support() {

  add_theme_support('custom-logo', array(
    "width" => 125,
    "flex-height" => true,
    "flex-width" => true,
  ));
  // Add New Post Thumbnail Sizes
  add_image_size('timeline-thumbnail', 300, 9999);
  add_image_size('header-image', 9999, 42);
}

function atc_site_icon_image_sizes($sizes) {
  $sizes[] = 96;
  $sizes[] = 72;
  $sizes[] = 64;
  $sizes[] = 48;
  $sizes[] = 36;

  return $sizes;
}

function atc_icon_meta_tags($tags) {
  $tags[] = sprintf('', esc_url(get_site_icon_url(96)));
  $tags[] = sprintf('', esc_url(get_site_icon_url(72)));
  $tags[] = sprintf('', esc_url(get_site_icon_url(64)));
  $tags[] = sprintf('', esc_url(get_site_icon_url(48)));
  $tags[] = sprintf('', esc_url(get_site_icon_url(36)));

  return $tags;
}

add_action('after_setup_theme', 'atc_theme_support');
add_filter('site_icon_image_sizes', 'atc_site_icon_image_sizes');
add_filter('site_icon_meta_tags', 'atc_icon_meta_tags');
