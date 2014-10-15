<?php

include('head.php');

include ('functions.php');

// this is where we process the input from the front page!

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


// this creates a .txt file with the current time in milliseconds and writes the input to it. then we can use the $file throughout!
$file = "results/".explode(' ', microtime())[1].".txt";
file_put_contents($file, $_POST['input']);

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
				<a class="button pull-left" href="index.php"><i class="fa fa-chevron-left fa-fw"></i>Home</a>
				
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
			</div>
			
			<div class="grid-50">
				<h2>Results Comparison: </h2>
				<? 
					$originalLength = strlen($_POST['input']);
					$newLength = strlen(file_get_contents($file));
					$ratio = number_format((100 - (($newLength/$originalLength) * 100)), 2)."%";
				echo "Original size: ".$originalLength."<br>";
				echo "Compressed size: ".$newLength."<br>";
				echo "Size Savings: ".$ratio."<br>";
				?>
			</div>
	</section>
</body>