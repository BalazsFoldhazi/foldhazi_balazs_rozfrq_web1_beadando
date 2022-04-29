function validateRegForm() {
  var re = /\S+@\S+\.\S+/;	
  var user_name = document.forms["reg_form"]["user_name"].value;
  var user_veznev = document.forms["reg_form"]["user_veznev"].value;
  var user_kernev = document.forms["reg_form"]["user_kernev"].value;
  
  var emailcim = document.forms["reg_form"]["user_email"].value;  
  var valid = re.test(emailcim);
  
  var user_jelszo = document.forms["reg_form"]["user_jelszo"].value;
  var user_jelszo_meg = document.forms["reg_form"]["user_jelszo_meg"].value; 
    
  if (user_name == "" ) {
    alert("Felhasználónév nincs kitöltve!");
    return false;
  }
    if (user_veznev == "" ) {
    alert("Vezetéknév nincs kitöltve!");
    return false;
  }
    if (user_kernev == "" ) {
    alert("Keresztnév nincs kitöltve!");
    return false;
  }
  
  if (emailcim == "" ) {
    alert("E-mail nincs kitöltve!");
    return false;
  }
  if(valid == false){
	alert("Nem megfelelő e-mail cím!");
    return false;  
  }
 
 if (user_jelszo == "" ) {
    alert("Jelszó nincs kitöltve!");
    return false;
  }
   if (user_jelszo_meg == "" ) {
    alert("Jelszó megerősítés nincs kitöltve!");
    return false;
  }
  if (user_jelszo_meg != user_jelszo ) {
    alert("A megadott jelszavak nem egyeznek!");
    return false;
  }
  

}