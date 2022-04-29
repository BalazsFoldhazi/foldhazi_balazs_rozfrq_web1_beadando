<h2>Bejelentkezés</h2>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include("./config.php");
		$user_name=$_REQUEST['user_name'];
		$user_jelszo=$_REQUEST['user_jelszo'];
		$jelszo_hash=hash('ripemd160', $user_jelszo);
		$sql = "SELECT user_name, user_veznev, user_kernev FROM users WHERE user_name = '$user_name' AND user_jelszo = '$jelszo_hash'";
		$result = $connect->query($sql);
		if ($result->num_rows > 0) {		
			while($row = $result->fetch_assoc()) {
				$_SESSION['user_fullname'] = $row["user_veznev"]. " " . $row["user_kernev"];
			}
			$_SESSION['valid'] = "true";
			$_SESSION['username'] = $user_name;
			header('Location: index.php');
		} else {
			echo "<p class=\"entry\">Helytelen jelszó vagy felhasználó név!</p>";
	
		}
		$connect->close();
	}
?>
<form id="log_form" action="" onsubmit="return validateLogForm()" method="post" enctype="multipart/form-data">	
	Felhasználó név: <br>
	<input type="text" name="user_name" id="user_name" value="" /><br>
	Jelszó:<br>
	<input type="password" name="user_jelszo" id="user_jelszo" value="" /><br><br>				
	<input type="submit" value="Bejelentkezés" name="submit">
</form>