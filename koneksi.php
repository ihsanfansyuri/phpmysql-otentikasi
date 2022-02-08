<?php
$host       = "localhost";
$user       = "root";
$pw         = "";
$database   = "pemwebdas_db";

$koneksi = mysqli_connect($host, $user, $pw, $database);

if (!$koneksi) {
  die("koneksi gagal: " . mysqli_connect_error());
}
