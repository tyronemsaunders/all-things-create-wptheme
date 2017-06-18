<?php
  $data = get_timeline_section_data();
?>

<section id="<?php echo $data['section']['slug']; ?>" class="timeline-section parallax-group" <?php echo $data['parallax-group']['style']; ?>>
  <div class="timeline-background parallax-layer back" <?php echo $data['back']['style']; ?>></div>
  <div class="timeline-base-feed parallax-layer base" <?php echo $data['base']['style']; ?>>
    <ul class="base-feed-left">
      <?php if (!empty($data['base']['A'])): foreach ($data['base']['A'] as $timeline_post) :
        global $post;
        $post = $timeline_post;
        setup_postdata($post);
      ?>
        <li class="row collapse align-right">
          <?php get_template_part('parts/content', 'timeline-article'); ?>
        </li>
      <?php endforeach; endif; ?>
    </ul>
    <ul class="base-feed-right">
      <?php if (!empty($data['base']['B'])): foreach ($data['base']['B'] as $timeline_post) :
        global $post;
        $post = $timeline_post;
        setup_postdata($post);
      ?>
        <li class="row collapse">
          <?php get_template_part('parts/content', 'timeline-article'); ?>
        </li>
      <?php endforeach; endif; ?>
    </ul>
  </div>
  <?php if (!empty($data['floaters'])) : foreach ($data['floaters'] as $floater) :
    global $post;
    $post = $floater;
    setup_postdata($post);
  ?>
    <?php get_template_part('parts/content', 'timeline-floater'); ?>
  <?php endforeach; endif; ?>
</section>
