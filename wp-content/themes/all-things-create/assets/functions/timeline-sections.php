<?php
  function get_timeline_section_data() {
    // perspective is set in _parallax.scss check to make sure values match
    $perspective = 10;

    // initialize the return object
    $data = array();

    // get parallax-group z index
    $data['z-index'] = get_query_var('parallax-z');

    // get the current category
    $category = get_category(get_query_var('cat'));

    // setup background
    $data['back'] = array();
    $data['category'] = array();
    $data['section'] = array();
    $data['section']['name'] = $category->name;
    $data['section']['slug'] = $category->slug;
    $data['category']['image'] = get_field('featured_image', 'category_' . $category->cat_ID);
    // speed for the background is hardcoded for now
    $data['back']['speed'] = -1 * $perspective;
    $data['back']['scale'] = 1 + ($data['back']['speed'] * -1) / $perspective;
    $data['back']['style'] = 'style="';
    $data['back']['style'] .= 'transform: translateZ(' . $data['back']['speed'] . 'px)';
    $data['back']['style'] .= ' scale(' . $data['back']['scale'] . ');';
    // alternate the background image between base layer and background layer
    if ($data['z-index'] == 1) {
      $data['back']['style'] .= ' background-image: url(' .esc_url($data['category']['image']['url']). ');';
      $data['back']['style'] .= ' background-position: 50% 0;';
      $data['back']['style'] .= ' background-size: cover;';
    }
    $data['back']['style'] .= ' background-repeat: no-repeat;"';

    // initializy the array for the base layer's feed
    $data['base'] = array();
    // initialize base style
    $data['base']['style'] = "";
    // alternate the background image between base layer and background layer
    if ($data['z-index'] == 2) {
      $data['base']['style'] = 'style="';
      $data['base']['style'] .= 'background-image: url(' .esc_url($data['category']['image']['url']). ');';
      $data['base']['style'] .= ' background-position: 50% 0;';
      $data['base']['style'] .= ' background-size: cover;';
      $data['base']['style'] .= ' background-repeat: no-repeat;"';
    }

    //get category posts for the base layer's feed
    $category_posts = get_posts(array(
      'posts_per_page' => 50,
      'category' => $category->cat_ID
    ));

    $data['base']['all'] = $category_posts;
    // alternate posts for each side of the timeline
    $data['base']['A'] = array();
    $data['base']['B'] = array();
    $category_posts_size = count($category_posts);
    for ($i = 0; $i < $category_posts_size; $i++) {
      if ($i % 2 == 0) {
        $data['base']['A'][] = $category_posts[$i];
      } else {
        $data['base']['B'][] = $category_posts[$i];
      }
    }

    // get category floaters
    $category_floaters = get_posts(array(
      'posts_per_page' => 50,
      'category' => $category->cat_ID,
      'post_type' => 'floater'
    ));

    $data['floaters'] = $category_floaters;

    // get parallax-group z index
    $data['parallax-group'] = array();
    $data['parallax-group']['style'] = 'style="';
    $data['parallax-group']['style'] .= 'z-index: ' . get_query_var('parallax-z') . ';"';

    return $data;
  }
