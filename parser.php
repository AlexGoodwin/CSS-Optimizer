<?php

include('head.php');

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

?>

<body>
	<section class="grid-parent grid-100">
		<div class="grid-100">
			
			<a class="button" href="index.php"><i class="fa fa-bolt fa-fw"></i>Home</a>

			<h1>Results: <a href="<? echo $file;?>">Download</a></h1>
		
			<h2>Input: </h2>
			<textarea readonly="true" rows="15" cols="20"><? echo $_POST['input'];?></textarea>
			
			<h2>Enabled Settings: </h2>
			<? 
			foreach($_POST as $key => $value){
				if($key === 'input') continue;
				
				echo $key." | ".$value."<br>";
			}
			?>
		</div>
	</section>
</body>