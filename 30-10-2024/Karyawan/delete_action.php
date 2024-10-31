<?php
include_once './config/connect.php';
include_once './classes/karyawan.php';

$database = new Database();
$db = $database->getConnection();

$karyawan = new Karyawan($db);
$karyawan->id_karyawan = $_GET['id_karyawan'];

$hasil = $karyawan->delete();


if($hasil) {
    header('location: ./');
} else {
    echo "<h1>";
    echo "data tidak bisa di hapus.";
    echo "</h1>";
    echo " - <a href=\"./\">Back Home</a>";
}

?>