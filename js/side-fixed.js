$(window).load(function () {
  var mainArea = $("#content");
  var sideWrap = $("#side");
  var sideArea = $("#sidefixed");

  var wd = $(window);
  var mainH = mainArea.height();
  var sideH = sideWrap.height();

  if(sideH < mainH) {
    sideWrap.css({"height": mainH,"position": "relative"});
    var sideOver = wd.height()-sideArea.height();
    var starPoint = sideArea.offset().top + (-sideOver);
    var breakPoint = sideArea.offset().top + mainH;

    wd.scroll(function() {
      if($("#fixed_point").height() < wd.height()) {
        if(wd.height() < sideArea.height()){
          if(starPoint < wd.scrollTop() && wd.scrollTop() + wd.height() < breakPoint){
            sideArea.css({"position": "fixed", "bottom": "20px", "margin-right": "5px"});
          }else if(wd.scrollTop() + wd.height() >= breakPoint){
            sideArea.css({"position": "absolute", "bottom": "0", "margin-right": "0"});
          } else {
            sideArea.css({"position": "static", "margin-right": "0"});
          }
        }else{
          var sideBtm = wd.scrollTop() + sideArea.height();
          if(mainArea.offset().top < wd.scrollTop() && sideBtm < breakPoint){
            sideArea.css({"position": "fixed", "top": "20px", "margin-right": "5px"});
          }else if(sideBtm >= breakPoint){
            var fixedSide = mainH - sideH;
            sideArea.css({"position": "absolute", "top": fixedSide, "margin-right": "0"});
          } else {
            sideArea.css({"position": "static", "margin-right": "0"});
          }
        }
      } else {
        sideArea.css({"position": "static", "margin-right": "0"});
      }
    });
  }
});