<?php

// just gonna put this here...
// http://minify.googlecode.com/svn/trunk/min/lib/Minify/CSS/Compressor.php
// (does like all of this)

// some good practices to check out:
// http://csslint.net/
/*!
	\author Alex Goodwin
	\author Sierra Murphy
	\author Kevin Martin
	\author Stephen
*/

/*!
     \brief A function to remove whitespace from submitted CSS code
     \param $file the file to be parsed
     \param $feed the contents of the submitted file
     \param $result the version of the submitted file without whitespace

     remove_whitespace searches through the file for all whitespace and removes it
     to compress the code into a more compact version.  This helps free up memory,
     and slightly increases speed and performance

*/	
function remove_whitespace($file) {
    
    $feed = file_get_contents($file);
    
    echo "<script>console.log('testing');</script>";

	$result = preg_replace('/\s+/', '', $feed);
	
	file_put_contents($file, $result);

    return $result;
}

/*!
     \brief A function to remove comments from submitted code
     \param $file the file to be parsed
     \param $result the version of the submitted file without comments

     remove_comments searches through the file for all comments and removes them
     to compress the code into a more compact version.  This helps free up memory,
     and increases speed and performance.

*/	
function remove_comments($file){

	$result = $file;
	$result = preg_replace('!/\*.*?\*/!s', '', $result);
	$result = preg_replace('/\n\s*\n/', "\n", $result);

	return $result;
}

/*!
     \brief A function to sort selectors alphabetically
     \param $file the file to be parsed
     \param $result the optimized version of the submitted file 

     sort_selectors searches through the file for all selectors and rearranges
     them into alphabetical order.  This helps speed up the program by listing
     the selectors in a logical order.

*/
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

/*!
     \brief A function to sort declarations alphabetically
     \param $file the file to be parsed
     \param $result the optimized version of the submitted file 

     sort_properties identifies declarations inside a declaration block and
     sorts them alphabetically within that block.  Be careful to preserve order of
     identical declarations (though the earlier one could ideally be removed)

*/
function sort_properties($file){
	// identifies each declaration inside a declaration
	// block and sorts them alphabetically within that
	// block.
	// Care should be given to preserve order of identical
	// declarations (though we could remove the earlier one)

	return $result;
}

/*!
     \brief A function to convert declarations to shorthand
     \param $file the file to be parsed
     \param $result the optimized version of the submitted file 

	 optimize_shorthand takes multiple declarations (such as margin-top and 
	 margin-bottom) and replaces them with the shorthand version of that
	 command.  This both compresses the physical code and improves speed.

*/
function optimize_shorthand($file){
	// takes multiple declarations (such as margin-top and
	// margin-bottom) and replaces with the shorthand version

	return $result;
}

/*!
     \brief A function to remove unneccesary uppercase characters
     \param $file the file to be parsed
     \param $result the optimized version of the submitted file 

     fix_cases removes uppercase characters in CSS with a few exceptions:
     1) Class and Id names
     2) Font
     3) Font-family
     4) Content
     5) url() (such as in "background")

*/
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
