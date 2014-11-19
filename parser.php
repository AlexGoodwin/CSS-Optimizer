<?php

include('head.php');

include ('functions.php');

/*!
	\author Alex Goodwin
	\author Sierra Murphy
	\author Kevin Martin
	\author Stephen
*/

/*!  \file parser.php
     \brief Processes input from the front page

    This file sucks in the CSS code from our user interface and inputs it as
    a file, extracts the optimizations selected by the user, and calls functions.php
    accordingly to optimize user code.
*/

// this is where we process the input from the front page

// here's the architecture:
//		name					type
// 		input 					string
// 		removeComments 			bool
//		removeWhiteSpace		bool
//		sortSelectors			bool
//		sortPorperties			bool
//		shorthand				bool
//		fixCases				bool
//		combineLikeSelectors	bool


$file = "results/".explode(' ', microtime())[1].".txt"; /*! < this creates a .txt file with the current time in milliseconds and writes the input to it so we can use the $file throughout! */
file_put_contents($file, $_POST['input']);


// Actions. Not sure about what the best order is?
if($_POST['removeWhiteSpace']){
	remove_whitespace($file);
}
if($_POST['removeComments']){
	remove_comments($file);
}

?>

<body>
	<section class="grid-parent grid-100">
			
			<div class="grid-100">
				<a class="button pull-left" href="index.php"><i class="fa fa-chevron-left fa-fw"></i> Home</a>
				
				<a class="button pull-right" href="<? echo $file;?>"><i class="fa fa-download fa-fw"></i> Download</a>
			</div>
		
			<div class="grid-50">
				<h2>Input: </h2>
				<textarea readonly="true" rows="15" style="width: 100%;"><? echo $_POST['input'];?></textarea>
			</div>
			
			<div class="grid-50">
				<h2>Output: </h2>
				<textarea readonly="true" rows="15" style="width: 100%;"><? echo file_get_contents($file);?></textarea>
			</div>
			
			<div class="grid-50">
				<h2>Enabled Settings: </h2>
				<? 
				foreach($_POST as $key => $value){
					if($key === 'input') continue;
					
					echo $key." | ".$value."<br>";
				}
				?>
				<h2>Internal Notes:</h2>
				<p>Remove comments isn't working properly.</p>
			</div>
			
			<div class="grid-50">
				<h2>Results Comparison: </h2>
				<? 
					$originalLength = strlen(utf8_decode($_POST('input'))); ;
					$newLength = strlen(file_get_contents(utf8_decode($file)));
					$ratio = number_format((100 - (($newLength/$originalLength) * 100)), 2)."%";
				echo "Original size: ".$originalLength."<br>";
				echo "Compressed size: ".$newLength."<br>";
				echo "Size Savings: ".$ratio."<br>";
				?>
			</div>
	</section>
</body>
