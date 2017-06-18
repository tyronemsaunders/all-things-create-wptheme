<?php
  function get_timeline_floater_data() {
    // perspective is set in _parallax.scss check to make sure values match
    $perspective = 10;
    // initialize the return object
    $data = array();

    // setup floater style
    $floater_fields = get_fields(); // Defaults to current post ID
    $floater_container_style = 'style="';
    $floater_container_style .= 'transform: translateZ(' . $floater_fields['speed'] . 'px)';
    $floater_container_style .= ' scale(' .  (1 + ($floater_fields['speed'] * -1) / $perspective) . ');"';

    $floater_content_style = 'style="';
    $floater_content_style .= 'width: ' . $floater_fields['width'] . '%;';
    $floater_content_style .= ' left: ' . $floater_fields['x_coordinate'] . '%;';
    $floater_content_style .= ' top: ' . $floater_fields['y_coordinate'] . '%;"';

    $floater_style = 'style="';
    $floater_style .= 'transform: translateZ(' . $floater_fields['speed'] . 'px)';
    $floater_style .= ' scale(' .  (1 + ($floater_fields['speed'] * -1) / $perspective) . ');';
    $floater_style .= ' width: ' . $floater_fields['width'] . '%;';
    $floater_style .= ' left: ' . $floater_fields['x_coordinate'] . '%;';
    $floater_style .= ' top: ' . $floater_fields['y_coordinate'] . '%;"';
    // initialize the return object
    $data['fields'] = $floater_fields;
    $data['container_style'] = $floater_container_style;
    $data['content_style'] = $floater_content_style;
    $data['style'] = $floater_style;

    return $data;
  }
