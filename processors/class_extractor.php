<?php
function extractIdentifiers($html) {
        $res = array();
        $pattern = "/(class|id) ?= ?(\"|').+?(\"|')/";
        preg_match_all($pattern, $html, $matches);
        foreach ($matches[0] as $match) {
          $clean = explode("\"", $match)[1];
          array_push($res, $clean);
        }
        return $res;
}
?>
