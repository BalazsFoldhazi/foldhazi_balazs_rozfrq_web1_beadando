<h2>Regisztráció</h2>
<?php

	$reg_success = "false";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include("./config.php"); 
		$user_name=$_REQUEST['user_name'];
		$user_veznev=$_REQUEST['user_veznev'];
		$user_kernev=$_REQUEST['user_kernev'];
		$emailcim=$_REQUEST['user_email'];
		$user_jelszo=$_REQUEST['user_jelszo'];
		$jelszo_hash=hash('ripemd160', $user_jelszo);
		$sql = "INSERT INTO users (user_name, user_veznev, user_kernev, user_email, user_jelszo) VALUES ('$user_name','$user_veznev','$user_kernev','$emailcim','$jelszo_hash')";
		if ($connect->query($sql) === TRUE) {
			echo "<p class=\"entry\">Sikeres regisztráció!</p>";
			$reg_success = "true";
		} else {
			echo "<p class=\"entry\">Hiba: Van már ilyen felhasználó!</p>";
			//echo "<p class=\"entry\">Hiba: " . $sql . "</p>" . $connect->error;
			$reg_success = "false";
		}
	$connect->close();
	}

	if ($reg_success == "false") {
		echo "
			<form id=\"reg_form\" action=\"\" onsubmit=\"return validateRegForm()\" method=\"post\" enctype=\"multipart/form-data\">	
				Felhasználó név:<br>
				<input type=\"text\" name=\"user_name\" id=\"user_name\" value=\"\" /><br>
				Vezetéknév:<br>
				<input type=\"text\" name=\"user_veznev\" id=\"user_veznev\" value=\"\" /><br>
				Keresztnév:<br>
				<input type=\"text\" name=\"user_kernev\" id=\"user_kernev\" value=\"\" /><br>
				Email cím:<br>
				<input type=\"text\" name=\"user_email\" id=\"user_email\" value=\"\" /><br>
				Jelszó:<br>
				<input type=\"password\" name=\"user_jelszo\" id=\"user_jelszo\" value=\"\" /><br>
				Jelszó megerősítés:<br>
				<input type=\"password\" name=\"user_jelszo_meg\" id=\"user_jelszo_meg\" value=\"\" /><br><br>
				<input type=\"submit\" value=\"Regisztráció\" name=\"submit\">
			</form>";
	}
?>
