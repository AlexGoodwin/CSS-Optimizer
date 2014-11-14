<?php
function make_short($base_style, $args_arr) {
  $format = '%s: %d %d %d %d';
  $res = sprintf($format, $base_style, $args_arr['top'], $args_arr['right'],
                 $args_arr['bottom'], $args_arr['left']);
  return $res;
}

function find_short($classes) {
  # Expects an array of classes as returned by the classFinder util.
  $pattern = '/-(top|right|bottom|left):/';
  foreach($classes as $class) {
    $base_styles = array();
    foreach($class as $style) {
      $base_style = $style.explode('-')[0];
      preg_match_all($pattern, $style, $matches);
      //foreach($matches[0] as $match) {
      //}
    }
  }


}
