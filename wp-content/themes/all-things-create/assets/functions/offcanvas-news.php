<?php
  function get_offcanvas_news_items() {
    // initialize the return object
    $data = array();

    // exclude categories used in timeline
    $timeline_categories = get_timeline_nav_items();
    $excluded_cat_ids = array();
    foreach($timeline_categories as $timeline_cat) {
      $excluded_cat_ids[] = (int)$timeline_cat->object_id * -1;
    }
    $query_cat_ids = implode(",", $excluded_cat_ids);

    $data['articles'] = get_posts(array(
      'posts_per_page' => 20,
      'category' => $query_cat_ids
    ));

    return $data;
  }
