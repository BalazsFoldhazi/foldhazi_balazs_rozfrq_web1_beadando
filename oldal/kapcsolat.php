<h2>Kapcsolat</h2>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include("./config.php");
		
		$nev=$_REQUEST['s_nev'];
		$email=$_REQUEST['s_email'];
		$targy=$_REQUEST['s_targy'];
		$uzenet=$_REQUEST['s_uzenet'];
		$sql = "INSERT INTO emails (nev, email, targy, uzenet) VALUES ('$nev','$email','$targy','$uzenet')";
		if ($connect->query($sql) === TRUE) {
				
					echo "<p class=\"entry\">Név: $nev<br>
					E-mail: $email<br>
					Tárgy: $targy<br>
					Üzenet:<br>
					$uzenet</p>";
			
		} else {
			echo "Hiba: " . $sql . "<br>" . $conn->error;
		}
		$connect->close();
	
	}
?>


<form id="email_form" action="" onsubmit="return validateEmailForm()" method="post" enctype="multipart/form-data">

		<span title="Szükséges mező">Név: *</span><br>
		<input type="text" maxlength="255" name="s_nev" id="nev" size="60" placeholder="Neve" />
		<br><br>
		<span title"Szükséges mező">E-mail cím: *</span><br>
		<input type="text" maxlength="255" name="s_email" id="email" size="60" placeholder="E-mail címe" />
		<br><br>
		<span title="Szükséges mező">Tárgy: *</span><br>
		<input type="text" maxlength="255" name="s_targy" id="targy"  size="60" placeholder="Tárgy" />
		<br><br>
		<span title="Szükséges mező">Üzenet: *</span><br>
		<textarea name="s_uzenet" id="uzenet" placeholder="Írjon üzenetet!" /></textarea>
		<br><br>
		<input type="submit" name="kuld" id="kuld" value="E-mail elküldése" />
	
</form>
<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d4603.035982386196!2d21.103200471780294!3d46.686364731378845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sgoogle!5e0!3m2!1shu!2shu!4v1651218492770!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>