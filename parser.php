<?php

include('head.php');

include ('functions.php');
/*!
	\author Alex Goodwin
	\author Sierra Murphy
	\author Kevin Martin
	\author Stephen Thoma

*/

/*!  \file parser.php
     \brief Processes input from the front page

    This file sucks in the CSS code from our user interface and inputs it as
    a file, extracts the optimizations selected by the user, and calls functions.php
    accordingly to optimize user code.

*/


/*!  \breif Architecture of this file
		name					type
 		input 					string
 		removeComments 			bool
		removeWhiteSpace		bool
		sortSelectors			bool
		sortPorperties			bool
		shorthand				bool
		fixCases				bool
		combineLikeSelectors	bool

*/

// this creates a .txt file with the current time in milliseconds and writes the input to it so we can use the $file throughout!
$file = "results/".explode(' ', microtime()).".css";

// prioritize the textarea over the url
if(strlen($_POST['input']) < 1){
	$inputSource = 'url';
	$url = htmlspecialchars($_POST['url']);
	$urlSize = curl_get_file_size($url);

	$extension = preg_replace('%\?.+%', '', pathinfo($url, PATHINFO_EXTENSION));

	// minify the css if it's a css file, crawl it if not
	if($extension == 'css'){
		if($urlSize < 1000000){
			file_put_contents($file, fopen($url, 'r'));
			$originalLength = filesize($file);
		}
		else{
			echo '<script>console.log("file is too big");</script>';
		}
	}
	else{
		// file is not css.
		file_put_contents($file, find_and_combine_css($url));
		$originalLength = filesize($file);
	}

}
else{
	$inputSource = 'input';
	file_put_contents($file, $_POST['input']);
	$originalLength = filesize($file);
}

$originalFile = 'results/testing.txt';
file_put_contents($originalFile, file_get_contents($file));

// Actions. Not sure about what the best order is?
if($_POST['removeWhiteSpace']){
	remove_whitespace($file);
}
if($_POST['removeComments']){
	remove_comments($file);
}

?>

  <div class="grid-container">
    <section class="grid-parent grid-100">
      <div class="grid-100">
        <div class="header grid-40 push-30">
          <a href="index.php">
            <h1><span>CSS</span> OPTIMIZER</h1>
            <? include('tagline.php');?>
          </a>
        </div>
      </div>

      <div class="grid-100">
		<div class="grid-35 push-65">
			<a class="button full" href="<?echo $file;?>"><i class='fa fa-download'></i> Download Result</a>
        </div>
      </div>

      <div class="grid-100">
        <div class="grid-35">
          <div class="css-area">
            <h2><i class="fa fa-arrow-circle-o-down light"></i> Input</h2>
            <div class="code-wrapper">
              <code class="language-css">
                <? if($inputSource == 'input'){ echo $_POST['input'];}
	               else{echo file_get_contents(utf8_decode($originalFile));}?>
              </code>
            </div>
          </div>
        </div>

        <div class="grid-30">
          <?
            try {
              $newLength = strlen(file_get_contents(utf8_decode($file)));
              $ratio = number_format((100 - (($newLength/$originalLength) * 100)), 2);
              echo "<script>$(document).ready(function() { animate_gauge(".$ratio.") })</script>";
              //echo "Original size: ".$originalLength."<br>";
              //echo "Compressed size: ".$newLength."<br>";
              //echo "Size Savings: ".$ratio."<br>";
            } catch (Exception $e) {
              echo "Error calculating compression statistics.";
            }
          ?>
          <h3 id="tweaks-title">Compression</h3>
          <div class="gauge col-center">
            <div class="meter"></div>
            <div class="percentage-container">
              <? echo round($ratio)."%"; ?>
            </div>
          </div>
          <div class="fileSizes">
	      <? echo '<p>Original filesize: <span>'.filesize($originalFile).'</span></p><p>New filesize: <span>'.filesize($file).'</span></p>';?>
          </div>
          <ul class="enabled-tweaks">
            <?
              foreach($_POST as $key => $value){
                if($key === 'input') continue;
                  echo
                    '<li>
                      <span class="fa-stack fa-lg">
                        <i class="fa fa-stack-2x fa-circle-thin"></i>
                        <i class="fa fa-stack-1x fa-check tweak-icon"></i>
                      </span>'
                    .$key.'</li>';
              }
            ?>
          </ul>
        </div>

        <div class="grid-35">
          <div class="css-area">
            <h2><i class="fa fa-arrow-circle-o-up light"></i> Output</h2>
            <div class="code-wrapper">
              <code class="language-css">
                <? echo file_get_contents($file);?>
              </code>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
  <footer class="sticky-foot">
    <div class="grid-33">
      <p>Handcrafted in Boulder, Co</p>
    </div>
    <div class="grid-33">
      <p>by <a href="http://www.alexgoodwinmedia.com">Alex</a>, <a href="http://www.kevinmart.in">Kevin</a>, <a href="http://www.sarahpac.com">Sierra</a>, and <a href="http://www.stephenthoma.com">Stephen</a></p>
    </div>
    <div class="grid-33">
      <p>Software Methods, 2014</p>
    </div>
  </footer>
<?
require('settings.inc');
// write new row to sql table
$con = mysqli_connect($sql_host, $sql_user, $sql_password, $sql_database);
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
$options = '';
foreach($_POST as $key => $value){
	if($value){
		$options .= $key.',';
	}
}
// remove trailing comma
$options = rtrim($options, ',');
$query = 'INSERT INTO sessions (options, compression) VALUES ("'.$options.'", '.$ratio.');';
$result = mysqli_query($con, $query);
