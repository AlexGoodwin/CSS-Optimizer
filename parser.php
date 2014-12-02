<?php

include('head.php');

include ('functions.php');

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


// this creates a .txt file with the current time in milliseconds and writes the input to it. then we can use the $file throughout!
$file = "results/".explode(' ', microtime())[1].".txt";
file_put_contents($file, $_POST['input']);


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
      <div class="header grid-40 push-30">
        <h1><span>CSS</span> OPTIMIZER</h1>
        <p class="tagline">Let's cut the fat out of that sloppy CSS</p>
      </div>
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

    </section>
  </div>
  <footer class="sticky-foot">
    <div class="grid-33">
      <p>Handcrafted in Boulder, Co</p>
    </div>
    <div class="grid-33">
      <p>by <a href="http://www.alexgoodwinmedia.com">Alex</a>, <a href="http://www.kevinmart.in">Kevin</a>, Sierra, and <a href="http://www.stephenthoma.com">Stephen</a></p>
    </div>
    <div class="grid-33">
      <p>Software Methods, 2014</p>
    </div>
  </footer>
