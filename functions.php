  
<?php
function remove_whitespace($file) {
        
        $feed = file_get_contents($file);
        return trim($feed);

}
function remove_comments($file){

	$temp = $file;
	$temp = preg_replace('!/\*.*?\*/!s', '', $temp);
	$temp = preg_replace('/\n\s*\n/', "\n", $temp);
	return $temp;


}
?>