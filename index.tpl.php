<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="Hu">
<head>
	<title>Békéscsabai Előre Női Kézilabda Sportegyesület</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap .min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script type="text/javascript" src="./javascript/bejelentkezes_ellenorzo.js"></script>
	<script type="text/javascript" src="./javascript/regisztracio_ellenorzo.js"></script>
	<script type="text/javascript" src="./javascript/kapcsolat_ellenorzo.js"></script>
	<script type="text/javascript" src="http://www.google.com/cse/tools/onthefly?form=searchbox_demo&lang=hu"></script>

	


</head>

<body>
    
	<div id="wrapper">
		<header>		
			<img src="./kepek/logo.png" alt="Logo">
			<section class="header">			
			<form method=get action="http://www.google.com/search">
				<input type=text name=q maxlength=255 value="" placeholder="Keresés">
				<input type=submit name=btng value="Keresés">
			</form><br>			
			<?php include("bejelentkezett.php");?>			
			</section>
		</header>

		<nav>
			<ul>
				<?php include("fomenu.php");?>
			</ul>
		</nav>
	
		<article>
		<section class="post">
		   
			<?php include("oldal/{$keres['fajl']}.php");?>
		</section>
		</article>		
		<?php include("oldal/footer.php");?>		
	</div>

</body>

</html>
