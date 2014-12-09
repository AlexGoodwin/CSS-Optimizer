<?
	$tagline = array(
		".iceberg { position: fixed; } .titanic { float: none; }",
		".Illuminati { position: absolute; visibility: hidden;}",
		"#chucknorris * { z-index: 9999; }",
		"#hipster { .bike { position: fixed;}}");

		$rand = rand(0,sizeof($tagline)-1);?>
<p class="tagline"><?echo $tagline[$rand];?></p>