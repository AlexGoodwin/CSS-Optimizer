<?php

// just gonna put this here...
// http://minify.googlecode.com/svn/trunk/min/lib/Minify/CSS/Compressor.php
// (does like all of this)

// some good practices to check out:
// http://csslint.net/

function remove_whitespace($file) {

    $feed = file_get_contents($file);

	$result = preg_replace('/\s+^\n/', '', $feed);

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

?>
