<?php
function map_trim($val, $del) {
  return trim($val, $del);
}

function extractIdentifiers($html) {
  // Accepts a string containing HTML which will be parsed to
  // retrieve ids, classes, and DOM elements used.
  $id_res = array();
  $tag_res = array();

  // Extract classes and ids
  $pattern = "/(class|id) ?= ?(\"|').+?(\"|')/";
  preg_match_all($pattern, $html, $id_matches);
  // Strip quotes from results
  foreach ($id_matches[0] as $match) {
    $clean = explode("\"", $match)[1];
    array_push($id_res, $clean);
  }

  // Extract HTML tags
  $pattern = "/<.+?( |>)/";
  preg_match_all($pattern, $html, $tag_matches);
  // Strip spaces and brackets
  foreach ($tag_matches[0] as $match) {
    $clean = trim($match, '</> ');
    array_push($tag_res, $clean);
  }

  // Merge results arrays and return de-duped array of results
  $res = array_merge($id_res, $tag_res);
  return array_unique($res);
}
?>

