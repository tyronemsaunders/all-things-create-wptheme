<?php
  global $post;
  $column_size = rand(4, 10);
?>

<article id="<?php echo $post->post_name; ?>" class="base-feed-article small-<?php echo $column_size; ?> column">
  <figure class="image">
    <div class="mask row align-middle align-center" data-open="<?php echo $post->post_name; ?>-modal">
      <div class="text-center small-12 columns"><?php echo esc_html(get_the_title($post)); ?></div>
    </div>
    <?php echo get_the_post_thumbnail($post, 'timeline-thumbnail'); ?>
  </figure>
  <section id="<?php echo $post->post_name; ?>-modal" class="large reveal timeline-article-modal" data-reveal>
    <header class="row article-title-modal">
      <h2 class="small-12 columns"><?php echo esc_html(get_the_title($post)); ?></h2>
    </header>
    <figure class="row article-image-modal">
      <div class="small-12 columns">
        <?php echo get_the_post_thumbnail($post, 'full'); ?>
      </div>
    </figure>
    <div class="row article-content-modal">
      <div class="small-12 columns">
        <?php echo apply_filters('the_content', $post->post_content); ?>
      </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
</article>
