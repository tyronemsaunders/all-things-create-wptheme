<?php
  $data = get_site_nav_data();
?>
<nav class="offcanvas-nav">
	<div class="offcanvas-nav-close align-right row">
		<div class="header-logo small-9 columns">
			<a class="header-logo-link" href="<?php echo esc_url(home_url('/')); ?>">
				<img src="<?php echo $data['site_icon_url']; ?>" alt="<?php bloginfo('name'); ?>">
			</a>
		</div>
		<div class="shrink column offcanvas-nav-close-btn">
			<i class="fa fa-times"></i>
		</div>
	</div>
	<ul class="row">
    <?php
      $site_nav_items = $data['site_nav_items'];
      $num = count($site_nav_items);
      for ($i = 1; $i < $num; $i++) : $page = $site_nav_items[$i];

    ?>
    <li class="offcanvas-nav-link small-12 columns">
      <a href="#<?php echo get_post($page->object_id)->post_name; ?>" class="offcanvas-page-link" title="<?php echo $page->title; ?>" data-link="<?php echo get_post($page->object_id)->post_name; ?>"><?php echo $page->title; ?></a>
    </li>
    <?php endfor; ?>
	</ul>
</nav>
