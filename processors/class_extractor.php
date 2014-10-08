<?php
error_reporting(-1);

function extractIdentifiers($html) {
        $matches = array();
        $pattern = "(?:class|id) ?= ?(\"|')(.+?)(\"|')";
        preg_match($pattern, $html, $matches);
        return $matches;
}

echo extractIdentifiers('id="abcd"')[0];

?>
