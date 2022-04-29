<?php
include('config.inc.php');

$oldalak = array();
foreach ($fomenu as $kulcs => $ertek)
  $oldalak[$kulcs] = $fomenu[$kulcs];
foreach ($oldalmenu as $menu) {
  foreach ($menu as $kulcs => $ertek)
    $oldalak[$kulcs] = $menu[$kulcs];
}

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