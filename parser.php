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
      <div class="grid-100">
        <div class="header grid-40 push-30">
          <a href="index.php">
            <h1><span>CSS</span> OPTIMIZER</h1>
            <p class="tagline">Let's cut the fat out of that sloppy CSS</p>
          </a>
        </div>
      </div>

      <div class="grid-100">
        <div class="grid-35">
          <div class="css-area">
            <h2><i class="fa fa-arrow-circle-o-down light"></i> Input</h2>
            <div class="code-wrapper">
              <code class="language-css">
                <? echo $_POST['input'];?>
              </code>
            </div>
          </div>
        </div>

        <div class="grid-30">
          <h3 id="tweaks-title">Compression</h3>
          <div class="gauge col-center">
            <div class="meter"></div>
            <div class="percentage-container">
              84%
            </div>
          </div>
          <ul class="enabled-tweaks">
            <li>
              <span class="fa-stack fa-lg">
                <i class="fa fa-stack-2x fa-circle-thin"></i>
                <i class="fa fa-stack-1x fa-check tweak-icon"></i>
              </span>
                Remove comments
            </li>
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
      <p>by <a href="http://www.alexgoodwinmedia.com">Alex</a>, <a href="http://www.kevinmart.in">Kevin</a>, Sierra, and <a href="http://www.stephenthoma.com">Stephen</a></p>
    </div>
    <div class="grid-33">
      <p>Software Methods, 2014</p>
    </div>
  </footer>
