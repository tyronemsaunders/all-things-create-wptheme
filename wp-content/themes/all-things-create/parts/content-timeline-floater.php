<?php
  global $post;
  $data = get_timeline_floater_data();
?>
<div id="<?php echo $post->post_name; ?>" class="timeline-floater-container parallax-layer floater" <?php echo $data['container_style']; ?>>
  <figure class="timeline-floater-content" <?php echo $data['content_style']; ?>>
    <?php echo get_the_post_thumbnail($post, 'full'); ?>
  </figure>
</div>
