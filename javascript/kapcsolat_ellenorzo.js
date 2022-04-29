function validateEmailForm() {
  var re = /\S+@\S+\.\S+/;	
  var nev = document.forms["email_form"]["nev"].value;
  var emailcim = document.forms["email_form"]["email"].value;
  var targy = document.forms["email_form"]["targy"].value;
  var szoveg = document.forms["email_form"]["uzenet"].value;
  var valid = re.test(emailcim);
  
  if (nev == "" ) {
    alert("Név mező nincs kitöltve!");
    return false;
  }
  if (emailcim == "" ) {
    alert("E-mail mező nincs kitöltve!");
    return false;
  }
  if(valid == false){
	alert("Nem megfelelő e-mail cím!");
    return false;  
  }
  if (targy == "" ) {
    alert("Tárgy mező nincs kitöltve!");
    return false;
  }
  if(valid == false){
	alert("Nem megfelelő email cím");
    return false;  
  }
  
  if (szoveg == ""){
	alert("Az üzenet nincs kitöltve!");
	return false;
  }
  
}