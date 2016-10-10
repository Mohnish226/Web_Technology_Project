function clearall(){
    document.getElementById("carform").reset();
    document.getElementById("bikeform").reset();
}

$(document).ready(function () 
{	//called when key is pressed in textbox
  $("#bphone_no").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
    {
        //display error message
        $("#error").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () 
{	//called when key is pressed in textbox
  $("#cphone_no").keypress(function (e) 
  {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
    {
        //display error message
        $("#errorc").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});