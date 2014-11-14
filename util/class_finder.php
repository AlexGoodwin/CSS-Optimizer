<?php
# Go through a CSS file and find each class and associated styles
# TODO: Consider classes with name on multiple lines
function classFinder($css) {
  $in_class = False;
  $classes = array();
  $class_styles = array();

  $lines = explode("\n", $css);
  foreach($lines as $line) {
    if($in_class == False) {
      $class_start = strstr($line, '{');
      if(!empty($class_start)) { # If the line contains a open bracket
        $in_class = True; # then we're entering a class
        $class_name = $line; # TODO: Clean up names
      }
    }
    else { # We're already in a class
      $class_end = strstr($line, '}');
      if(empty($class_end)) { # If we aren't at the end of the class
        array_push($class_styles, $line);
      }
      else { # We're through the class
        $classes[$class_name] = $class_styles;
        $class_styles = array();
        $in_class = False;
      }
    }
  }
  return $classes;
}
?>

