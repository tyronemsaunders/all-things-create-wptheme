<article id="post-<?php the_ID(); ?>" class="row" role="article" itemscope itemtype="http://schema.org/WebPage">
	<header class="article-header small-order-2 small-12 columns">
    <h2><?php the_title();?></h2>
  </header> <!-- end article header -->
  <section class="article-content small-order-3 entry-content small-12 medium-6 columns" itemprop="articleBody">
	  <?php the_content(); ?>
	</section> <!-- end article section -->
  <figure class="article-figure small-order-1 small-12 medium-6 columns">
    <?php echo get_the_post_thumbnail($post, 'full'); ?>
  </figure>			
</article> <!-- end article -->
