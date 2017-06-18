<?php
  // setup the query for posts
  $data = get_offcanvas_news_items();
?>
<h1>News</h1>
<div class="row">
  <div class="small-12 medium-9 columns">
    <div class="orbit" role="region" aria-label="News" data-orbit>
      <ul class="orbit-container">
        <?php
          if (!empty($data['articles'])): foreach ($data['articles'] as $article) :
            global $post;
						$post = get_post($article);
						setup_postdata($post);
        ?>
        <li class="orbit-slide">
          <?php get_template_part('parts/content', 'offcanvas-article'); ?>
        </li>
      <?php endforeach; else: ?>
        <li class="orbit-slide">Coming Soon</li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="orbit-navigation">
      <div class="row">
        <div class="text-center small-6 medium-1 columns">
          <button class="orbit-previous"><span class="show-for-sr">Previous Article</span> &#9664;&#xFE0E;</button>
        </div>
        <div class="text-center small-6 medium-1 columns">
          <button class="orbit-next"><span class="show-for-sr">Next Article</span> &#9654;&#xFE0E;</button>
        </div>
      </div>
    </div>
  </div>
</div>
