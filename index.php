<? include('head.php');?>

<section class="grid-parent grid-100">
	
	<h1>CSS Optimizer</h1>
	
	<form class="grid-50">
		<label for="url">Enter URL: </label>
		<input type="text" placeholder="http://www.">
		
		<hr>
		
		<textarea placeholder="paste CSS here" rows="24" cols="40"></textarea>
		
	</form>
	
	<div class="grid-50">
		<button>On</button> Follow Links
		<button>OFF</button> Ignore JS
		
		<h2>Compression Settings</h2>
		<ul>
			<li>Gentle <small>(Larger File Size)</small></li>
			<li>Mid</li>
			<li>Agro <small>(Smallest File Size)</small></li>
		</ul>
		
		<h3>Fine-Tune</h3>
		<ul>
			<li><input type="checkbox"> Preserve Comments</li>
			<li><input type="checkbox"> Sort Selectors</li>
			<li><input type="checkbox"> Sort Properties</li>
			<li><input type="checkbox"> Shorthand Optimization</li>
			<li><input type="checkbox"> Fix CaSes</li>
			<li><input type="checkbox"> Remove White Space</li>
			<li><input type="checkbox"> Combine Like Selectors</li>
		</ul>
		
		<hr>
		
		<button type="submit">Go</button>
	</div>
</section>
<hr>
<section class="grid-parent grid-100">
	<h1>Optimization Report</h1>
	
	<div class="grid-50">
		<img src="//placehold.it/250x300" width="300" height="250">
	</div>
	
	<div class="grid-50">
		<h4>// Error: No CSS found</h4>
	
		<button disabled="true">Download Compressed CSS</button>
	</div>
</section>