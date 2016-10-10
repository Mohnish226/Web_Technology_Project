/* for accordion */

$(document).ready(function() {
  $("#submit").click(function(){
        $("#newpost").addClass('invi');
    $("#onToggle").click(function(){  //to show or hide progress
      $("#toggle").slideToggle("slow");
    });
    $(".navbar-toggle").click(function(){
      $("#left").slideDown("slow");
    });
    $(".btn").click(function(){
      $(".btn-primary").css("box-shadow","none");
    });
  });

//ripple effect for buttons

(function (window, $) {
  $(function() {
    $('.ripple').on('click', function (event) {
      event.preventDefault();
      var $div = $('<div/>'),
      btnOffset = $(this).offset(),
      xPos = event.pageX - btnOffset.left,
      yPos = event.pageY - btnOffset.top;
      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      $div
      .css({
        top: yPos - ($ripple.height()/2),
        left: xPos - ($ripple.width()/2),
        background: $(this).data("ripple-color")
      })
      .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 2000);
    });
  });
})(window, jQuery);

//to display value of sliders

function updateTextInput1(val) {
  document.getElementById('textInput1').innerHTML=val;
}
function updateTextInput2(val) {
  document.getElementById('textInput2').innerHTML=val;
}
function updateTextInput3(val) {
  document.getElementById('textInput3').innerHTML=val;
}
function updateTextInput4(val) {
  document.getElementById('textInput4').innerHTML=val;
}

//tooltip
  
$('[data-toggle="tooltip"]').tooltip(); 

// For rotating arrow in accordion

// $(document).ready(function(){
//   $(".panel-title").click(function(){
//     $(".glyphicon-triangle-bottom").toggleClass("rotate");
//   });
// });