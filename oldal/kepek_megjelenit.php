<?php
################################################################################
##---------------------------Feltöltött fájl néző-----------------------------##
################################################################################


$upload_dir = "images/";   //az a mappa amibe a feltöltött fájlok vannak
// Kép adatait listázzuk? (yes/no)
$image_data_list = "no";

//Ha hiányzik a mappa, akkor ezt írja ki
	if (!is_dir("$upload_dir")) {
		$error_dir=1;
		echo "<p class=\"entry\">Hiba: A feltöltési mappa ($upload_dir) nem érhető el!</p>";
   }else{
	   $error_dir=0;
   }
if ($error_dir==0) {
	// A megjelenítő készítése:
		echo "\t\t<div class=\"kepek_megjelenit\">";

	//megnyitjuk a feltöltési mappát
	$opendir =opendir($upload_dir);
	// megcsináljuk a táblát
	// lokalizáljuk a fájlokat kiírásra
	while ($file = readdir($opendir)) {
			//megnézzük a fájlokat
			if($file != '..' && $file !='.' && $file !=''){
					//a nem olvashatóakat jelezzük
					if (!is_dir($file)){

						// a képeket automatikusan méretezzük
						$imgsize = getimagesize ($upload_dir."".$file);

						// a fájlok méretét kicsinyitjük
						$file_size = filesize($upload_dir."".$file);

					if ($file_size >= 1048576){
						$show_filesize = number_format(($file_size / 1048576),2) . " MB";
					}elseif ($file_size >= 1024){
						$show_filesize = number_format(($file_size / 1024),2) . " kB";
					}elseif ($file_size >= 0){
						$show_filesize = $file_size . " bytes";
					}else{
						$show_filesize = "0 bytes";
					}
                        
					//Idő beállítása
					$last_modified = date ("Y.m.d.", filemtime($upload_dir."".$file));

					//a képek szélessége
					if ($imgsize[0] > 100){
						$base_img = "<img class=\"kepek\" src=\"$upload_dir$file\">";
					}else{
						$base_img = "<img class=\"kepek_kicsi\" src=\"$upload_dir$file\">";
					}
				
					//A kilistázó megjelenítése
					if ($image_data_list == "yes") {
						$all_stuff =  "<p class=\"data_yes\">
										<a href=\"$upload_dir$file\" target=\"_blank\">
										$base_img</a>
										&nbsp;&nbsp;Fájlnév: $file<br>
										&nbsp;&nbsp;Méret: $show_filesize<br>
										&nbsp;&nbsp;Felbontás: $imgsize[0]x$imgsize[1]px<br>
										&nbsp;&nbsp;Dátum: $last_modified
										</p>";
					}else{
						$all_stuff =  "<p class=\"data_no\"><a href=\"$upload_dir$file\" target=\"_blank\">$base_img</a>&nbsp;</p>";
					}
					echo "\n\t\t\t\t $all_stuff";
			}
		}
	}//bezárjuk a mappát.
	closedir($opendir);
	clearstatcache();
	echo "\n\t\t\t</div>\n";
}
?>
