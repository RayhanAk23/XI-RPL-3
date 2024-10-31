<?php
include_once './config/connect.php';
include_once './classes/karyawan.php';

$database = new Database();
$db = $database->getConnection();

$karyawan = new Karyawan($db);
$karyawan->id_karyawan = $_POST['id_karyawan'];
$karyawan->nama = $_POST['nama'];
$karyawan->posisi = $_POST['posisi'];
$karyawan->gaji = (int)$_POST['gaji'];

$hasil = $karyawan->edit();

echo "<h1>";
if($hasil) {
    echo "data berhasil di edit.";
} else {
    echo "data tidak bisa di edit.";
}
echo "</h1>";
echo " - <a href=\"./\">Back Home</a>";
?>