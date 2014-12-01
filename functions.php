<?php

// just gonna put this here...
// http://minify.googlecode.com/svn/trunk/min/lib/Minify/CSS/Compressor.php
// (does like all of this)

// some good practices to check out:
// http://csslint.net/

function remove_whitespace($file) {
    
    $feed = file_get_contents($file);
    
    echo "<script>console.log('". $feed ."');</script>";

	$result = preg_replace('/\s+/', '', $feed);
	
	file_put_contents($file, $result);

    return $result;
}
function remove_comments($file){

  $feed = file_get_contents($file);
	$result = preg_replace('!/\*.*?\*/!s', '', $feed);
	$result = preg_replace('/\n\s*\n/', "\n", $result);

  file_put_contents($file, $result);

	return $result;
}

function sort_selectors($file){
	// identifies each CSS declaration block and 
	// rearranges them by alphabetical order by selector

	// here's a declaration block: 
	// *anything other than {* 		{     *anything*     }
	// [------selector-------]		[----declarations----]
	//
	// Example:
	// 	h1.superHeader[focus]{
	//		border: 1px solid white;
	//		padding: 20px 17px;
	//		margin: 0 auto;
	//	}

	return $result;
}

function sort_properties($file){
	// identifies each declaration inside a declaration
	// block and sorts them alphabetically within that
	// block.
	// Care should be given to preserve order of identical
	// declarations (though we could remove the earlier one)

	return $result;
}

function optimize_shorthand($file){
	// takes multiple declarations (such as margin-top and
	// margin-bottom) and replaces with the shorthand version

	return $result;
}

function fix_cases($file){
	// there should be no uppercase characters in the CSS, with 
	// the following exceptions:
	// class and id names
	// font
	// font-family
	// content
	// url() (such as in "background")

	return $result;
}
?>
