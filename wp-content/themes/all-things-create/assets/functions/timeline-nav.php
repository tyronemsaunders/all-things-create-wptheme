<?php
  function get_timeline_nav_items() {

    // nav menu should be made of category post objects
    return wp_get_nav_menu_items('Timeline Navigation');
  }
