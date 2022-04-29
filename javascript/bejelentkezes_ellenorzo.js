function validateLogForm() {

  var user_name = document.forms["log_form"]["user_name"].value;
  var user_jelszo = document.forms["log_form"]["user_jelszo"].value;
    
  if (user_name == "" ) {
    alert("Felhasználónév nincs kitöltve!");
    return false;
  }
 
 if (user_jelszo == "" ) {
    alert("Jelszó nincs kitöltve!");
    return false;
  }


}