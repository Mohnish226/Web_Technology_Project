$(document).ready(function() {
  $("#signup_confirm_password").keyup(validate);
});
function validate() {
  var password1 = $("#signup_password").val();
  var password2 = $("#signup_confirm_password").val();
    if(password1 == password2) {
       $("#validate-status").text("");
       $("#signup").removeAttr("disabled");
        
    }
    else {
        $("#validate-status").text("PASSWORD DID NOT MATCH");
        $("#signup").attr("disabled", true);
    }
}