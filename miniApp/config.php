<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mini_app_db";
$port =3307;
$conn = mysqli_connect($host, $user, $pass, $dbname , $port);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
?>