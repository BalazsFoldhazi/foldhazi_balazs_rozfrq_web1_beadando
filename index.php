<?php

	ini_set('session.use_trans_sid', false);		
	ini_set('session.use_cookies', true);
	ini_set('session.use_only_cookies', true);
	$https = false;
	if(isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] != 'off') $https = true;
	$dirname = rtrim(dirname($_SERVER['PHP_SELF']), '/').'/';		
	session_set_cookie_params(0, $dirname, $_SERVER['HTTP_HOST'], $https, true);
	session_start();
	
include('config.inc.php');

$oldalak = array();
foreach ($fomenu as $kulcs => $ertek)
  $oldalak[$kulcs] = $fomenu[$kulcs];


$keres = current($oldalak);
if (isset($_GET['oldal'])) {
  if (isset($oldalak[$_GET['oldal']])) {
    $keres = $oldalak[$_GET['oldal']];
  } else {
    $keres = $hiba_oldal;
    header("HTTP/1.0 404 Not Found");
  }
}

include('index.tpl.php');
?>
