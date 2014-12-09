<? include('head.php');?>

<div class="grid-container">
  <section class="grid-parent grid-100">
    <div class="header grid-40 push-30">
      <a href="#">
        <h1><span>CSS</span> OPTIMIZER</h1>
        <p class="tagline">Let's cut the fat out of that sloppy CSS</p>
      </a>
    </div>

    <form class="grid-100 push-5" action="parser.php" method="post">

      <div class="grid-100">
        <div class="grid-70">
          <textarea id="css-textarea" name="input"></textarea>
        </div>

        <div class="grid-30">
          <h3>optimizer tweaks</h3>
          <ul id="tweaks">
            <li><label class="checkbox-label"><input type="checkbox" checked="checked" name="removeComments"> Remove comments</label></li>
            <li><label class="checkbox-label"><input type="checkbox" checked="checked" name="removeWhiteSpace"> Remove whitespace</label></li>
            <li><label class="checkbox-label"><input type="checkbox" name="sortSelectors"> Sort selectors</label></li>
            <li><label class="checkbox-label"><input type="checkbox" name="sortPorperties"> Sort properties</label></li>
            <li><label class="checkbox-label"><input type="checkbox" name="shorthand"> Shorthand optimization</label></li>
            <li><label class="checkbox-label"><input type="checkbox" name="fixCases"> Fix capitalization</label></li>
            <li><label class="checkbox-label"><input type="checkbox" name="combineLikeSelectors"> Combine like selectors</label></li>
          </ul>
        </div>
      </div>


      <div id="form-bottom" class="grid-100">
        <div class="grid-40 css-url">
          <label for="url">Or enter a URL: </label>
          <input type="text" id="url" placeholder="http://www.example.com/css/main.css">
        </div>

        <div class="grid-20 push-40">
          <button class="btn btn-default" type="submit">Submit <i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    </form>
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