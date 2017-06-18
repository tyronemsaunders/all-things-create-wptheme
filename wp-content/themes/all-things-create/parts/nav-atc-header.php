<?php
  $data = get_site_nav_data();
?>
<div class="header-nav align-middle expanded row">
  <div class="header-logo small-9 medium-3 columns">
    <a class="header-logo-link" href="<?php echo esc_url(home_url('/')); ?>">
      <img src="<?php echo $data['site_icon_url']; ?>" alt="<?php bloginfo('name'); ?>">
    </a>
  </div>
  <nav class="header-nav-container small-3 medium-9 columns">
    <div class="header-nav row align-middle align-right">
      <div class="header-menu-toggle-btn hide-for-large small-3 columns">
        <i class="fa fa-bars float-right" aria-hidden="true"></i>
      </div>
      <nav class="header-nav-links show-for-large medium-12 columns">
        <ul>
          <?php
            $site_nav_items = $data['site_nav_items'];
            $num = count($site_nav_items);
            for ($i = 1; $i < $num; $i++) : $page = $site_nav_items[$i];
          ?>
          <li class="header-nav-link float-right">
          	<a href="#<?php echo get_post($page->object_id)->post_name; ?>" class="offcanvas-page-link" title="<?php echo $page->title; ?>" data-link="<?php echo get_post($page->object_id)->post_name; ?>"><?php echo $page->title; ?></a>
          </li>
          <?php endfor; ?>
        </ul>
      </nav>
    </div>
  </nav>
</div>
