<?php
  function get_site_nav_items() {
    return wp_get_nav_menu_items('Site Navigation');
  }

  function get_site_nav_data() {
    $data = array();
    $data['site_nav_items'] = get_site_nav_items();
    $data['site_icon_url'] = esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'header-image')[0]);

    return $data;
  }
