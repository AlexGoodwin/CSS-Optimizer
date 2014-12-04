function animate_gauge(pct) {
  trans = "rotate(" + (pct / 2) / 100 + "turn)";
  $(".meter").css({transform : trans});
}

$(document).ready(function() {
  $("#css-textarea").click(function() {
    $(this).css("background-image", "none");
    $(this).css("background-color", "#ecf0f1");
  });

  $(".header").hover(
    function() {
      ele = $(this).find("span");
      $(ele).css("background-color","rgba(52, 152, 219, 0.8)");
    },
    function() {
    $(ele).css("background-color", "#34495e");
    });

});
