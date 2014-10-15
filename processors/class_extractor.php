<?php
function extractIdentifiers($html) {
  // Accepts a string containing HTML which will be parsed to
  // retrieve ids, classes, and DOM elements used.
  $res = array();

  // Extract classes and ids.
  $pattern = "/(class|id) ?= ?(\"|').+?(\"|')/";
  preg_match_all($pattern, $html, $matches);
  foreach ($matches[0] as $match) {
    $clean = explode("\"", $match)[1];
    array_push($res, $clean);
  }
  return array_unique($res);
}
?>

