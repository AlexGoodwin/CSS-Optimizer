<?php
function remove_whitespace($file) {
    
    $feed = file_get_contents($file);
    
    echo "<script>console.log('testing');</script>";

	$trimmed = preg_replace('/\s+/', '', $feed);
	
	file_put_contents($file, $trimmed);

    return $trimmed;
}
function remove_comments($file){

	$temp = $file;
	$temp = preg_replace('!/\*.*?\*/!s', '', $temp);
	$temp = preg_replace('/\n\s*\n/', "\n", $temp);

	return $temp;
}
?>