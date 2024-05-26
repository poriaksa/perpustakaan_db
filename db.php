<?php
$host = 'localhost';
$user = 'root'; // Ganti dengan user database Anda, default 'root'
$password = ''; // Ganti dengan password user database Anda, default kosong
$database = 'perpustakaan_db';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
