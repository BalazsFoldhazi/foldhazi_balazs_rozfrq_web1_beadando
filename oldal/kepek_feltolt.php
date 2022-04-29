<?php

if(isset($_SESSION["valid"])){
		$valid = "true";	  
	} else {
		$valid = "false";	
	}
	
//**********************************************************************//
//  $_FILES['filetoupload']  is the value of                            //
// file field from the form. <input type="file" name="filetoupload">    //
//**********************************************************************//
################################################################################
##---------------------------1 - Telepítés
################################################################################
   //Chmod-ot állítsd (777-re)
   $upload_dir = "images/";   //az a mappa amibe a fájlokat tölti fel, hozdd létre!
   $size_bytes = 1048576; //1 fájl max mérete (a fájlok limitjére való) 1MB=1048576
   $extlimit = "yes"; //Akarod limitálni a fájlok méretét? [yes vagy no] csak angol !!!
   $limitedext = array(".gif",".jpg",".png",".jpeg"); //A feltölthető kiterjesztésű fájlok:  //ajánlott ::(".gif",".jpg",".jpeg",".png",".txt",".nfo",".doc",".rtf",".htm",".dmg",".zip",".rar",".gz",".exe");
################################################################################
##---------------------------2 - A megjelenő cuccok
################################################################################
		
	//Ha hiányzik a mappa, akkor ezt írja ki
	if (!is_dir("$upload_dir")) {
		$error=1;
		echo "<p class=\"entry\">Hiba: A feltöltési mappa ($upload_dir) nem érhető el!</p>";
	}else{
		$error=0;
		}
   //ha a feltöltési mappának nincs 777 chmodja, akkor ezt írja ki.
   if (!is_writeable("$upload_dir") and $error==0){
		$error=1;
		echo "<p class=\"entry\">Hiba: a feltöltési mappa: ($upload_dir) NEM írható, változtasd a CHMOD-ot ('777')-re!</p>";
	}else{
		$error=0;
		}

################################################################################
##--------------3-1 - Kódolás
################################################################################
   if(isset($_POST['uploadform'])){
   // Most a fájlfeltöltőt fogjuk beállítani. 
   //feltöltő form

	// $filename Ellenőrzés.
	$file_tmp = $_FILES['filetoupload']['tmp_name'];
	$file_name = $_FILES['filetoupload']['name'];
	//Fájl méretének ellenőrzése
	$file_size = $_FILES['filetoupload']['size'];
           
		//Ha nem választottál ki fájlt feltöltésre.
		if (!is_uploaded_file($file_tmp) and $error==0){
			$error=1;
			echo "<p class=\"entry\">Hiba: Nem válaszott ki fájlt feltöltésre!</p>";
		}

		//Ha a fájl meghaladja a limitet.
        if (($file_size > $size_bytes) and $error==0){
			$error==1;
			echo "<p class=\"entry\">Hiba: a Fájl mérete meghaladja a megengedett limitet: ". $size_bytes / 1024 / 1024 ." MB.</p>";
		}
		
		//Fájl név ellenőrzés
		$ext = strrchr($file_name,'.');
		if (($extlimit == "yes") && (!in_array(strtolower($ext),$limitedext)) and $error==0) {
			$error=1;
			echo "<p class=\"entry\">Hiba: Nem megfelelő a fájl neve!</p>";
		}

		// Ha a fájl már van a szerveren
		if(file_exists($upload_dir.$file_name) and $error==0){
			$error=1;
			echo "<p class=\"entry\">Hoppá! Egy ilyen nevű fájl már található a szerveren: $file_name</p>";
		}

		$file_name = str_replace(' ', '_', $file_name);
		//A fájl mozgatása a feltöltési mappába
		if (!move_uploaded_file($file_tmp,$upload_dir.$file_name) and $error==0) {
			// Hiba történt a fájl áthelyezésében.
			$error=1;
			echo "<p class=\"entry\">Hiba történt a fájl feltöltésében. Próbáld újra!</p>";
		}elseif ($error==0){
			//sikeres feltöltés
			echo "<p class=\"entry\">A fájlod (<a href=\"$upload_dir$file_name\" target=\"_blank\">$file_name</a>) sikeresen feltöltve!</p>";
		}
   }
################################################################################
##---------------------------3-2 - A megjelenítő kódolása
################################################################################
	if ($valid == "true") {
	   echo 		
            "\t\t<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">\n"
			."\t\t\t\t<h3 class=\"kepfeltolt\">Képfeltöltés</h3>\n"
			."\t\t\t\t<p class=\"entry\">Válassza ki a fájlt feltöltésre!<br>\n"
            ."\t\t\t\tÉrvényes kiterjesztések:";
			for($i=0;$i<count($limitedext);$i++){
			if (($i<>count($limitedext)-1))$commas=", ";else $commas="";
			list($key,$value)=each($limitedext);
			$all_ext = $value.$commas;
		echo $all_ext;}
		echo "<br>"
			."Max fájl méret = ". $size_bytes / 1024 / 1024 ."MB</p>\n"
            ."\t\t\t\t<label class=\"custom-file-upload\"><input type=\"file\" name=\"filetoupload\">Kép kiválasztása</label><br>\n"
            ."\t\t\t\t<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"$size_bytes\"><br>\n"
            ."\t\t\t\t<input type=\"Reset\" name=\"reset\" value=\"Mégse\">"
			."\t\t\t\t<input type=\"Submit\" name=\"uploadform\" value=\"Feltöltöm\">\n"
            ."\t\t\t</form>\n";

   }//Vége
?>
