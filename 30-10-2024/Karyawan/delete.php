<?php
include_once 'connect.php';
include_once 'karyawan.php';

$database = new Database();
$db = $database->getConnection();

$karyawan = new Karyawan($db);
$karyawan->id = $_GET["id_karyawan"];

$hasil = $karyawan->delete();

if ($hasil) header("Location: ./");
else echo "<h1>Data Gagal Dihapus<h1><br> - <a href=\"./\">Back Home</a>";
?>