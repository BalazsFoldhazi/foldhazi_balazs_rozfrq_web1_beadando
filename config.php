<?php
//Adatbázis
$servername = "127.0.0.1";
$username = "agroundh_1912elore";
$password = "1912elore";
$dbname = "agroundh_1912elore";
// Csatlakozás
$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    die("Sikertelen csatlakozás: " . $connect->connect_error);
}
?>