<?php

	if(isset($_SESSION["valid"])){
		$valid = "true";	  
	} else {
		$valid = "false";	
	}
	foreach ($fomenu as $url => $oldal) {
		echo "\t\t\t\t<li";
		if ( $valid == "false" && $url == "kijelentkezes"){
			echo " class=\"rejtett_link\"";
		}    
		if ( $valid == "true" && ($url == "bejelentkezes" || $url == "regisztracio")){
			echo " class=\"rejtett_link\"";
		}
		if ($oldal == $keres ){
			echo " class=\"aktiv\"";
		}
		echo "><a title=\"".$oldal["szoveg"]."\" href=\"?oldal=". $oldal["fajl"] ."\">".$oldal["szoveg"]."</a></li>\n";
	}
	