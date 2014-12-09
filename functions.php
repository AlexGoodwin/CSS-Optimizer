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
	\author Stephen Thoma

*/

/*!  \file functions.php
     \brief Functions to perform optimizations

    Uses logic from functions remove_whitespace, remove_comments, sort_selectors,
    sort_properties, optimize_shorthand, and fix_cases to optimize and compress
    CSS code based on the preferences input by the user.

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

	// old version
	//$result = preg_replace('/\s+^\n/', '', $feed);

	$result = str_replace(array("\r", "\n"), "", $feed);

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

	$feed = file_get_contents($file);
	$result = preg_replace('!/\*.*?\*/!s', '', $feed);
	$result = preg_replace('/\n\s*\n/', "\n", $result);
	file_put_contents($file, $result);
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

/**
 * Returns the size of a file without downloading it, or -1 if the file
 * size could not be determined.
 *
 * @param $url - The location of the remote file to download. Cannot
 * be null or empty.
 *
 * @return The size of the file referenced by $url, or -1 if the size
 * could not be determined.
 */
function curl_get_file_size( $url ) {
  // Assume failure.
  $result = -1;

  $curl = curl_init( $url );

  // Issue a HEAD request and follow any redirects.
  curl_setopt( $curl, CURLOPT_NOBODY, true );
  curl_setopt( $curl, CURLOPT_HEADER, true );
  curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
  curl_setopt( $curl, CURLOPT_USERAGENT, get_user_agent_string() );

  $data = curl_exec( $curl );
  curl_close( $curl );

  if( $data ) {
    $content_length = "unknown";
    $status = "unknown";

    if( preg_match( "/^HTTP\/1\.[01] (\d\d\d)/", $data, $matches ) ) {
      $status = (int)$matches[1];
    }

    if( preg_match( "/Content-Length: (\d+)/", $data, $matches ) ) {
      $content_length = (int)$matches[1];
    }

    // http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
    if( $status == 200 || ($status > 300 && $status <= 308) ) {
      $result = $content_length;
    }
  }

  return $result;
}

function get_user_agent_string() {
    if (isset($_SERVER['HTTP_USER_AGENT']))
        $return = strtolower($_SERVER['HTTP_USER_AGENT']);
    else
        $return = '';

    return $return;
}

function find_and_combine_css($url){
	$urlFile = file_get_contents($url);

	$chunks = array();
	$regex = '#<link>?.+href=["|\'].+["|\']?.+</link>#';
	$regex = '%<link .+[^>]%';
	preg_match_all($regex, $urlFile, $chunks);

	$cssArray = array();

	foreach($chunks[0] as $key => $value){
		$array = array();
		$regex = '%href=".+"%';
		preg_match($regex, $value, $array);

		foreach($array as $key2 => $value2){
			$string = str_replace('href="', '', $value2);
			$regex = '%".+"%';
			$string = preg_replace($regex, '', $string);
			$string = str_replace('"', "", $string);
			$cssArray[] = $url.$string;
		}
	}

	$masterCss = '';

	foreach($cssArray as $key => $value){
		$masterCss .= file_get_contents($value);
	}

	return $masterCss;
}

?>
