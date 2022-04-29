<?php
	if(isset($_SESSION["valid"])){
		echo "Bejelentkezett: <br>". $_SESSION['user_fullname']. " " . "(". $_SESSION['username'] .")\t\n";
	} else {
		echo "";
	}
?>
