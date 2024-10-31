<?php
include_once './config/connect.php';
include_once './classes/karyawan.php';

$database = new Database();
$db = $database->getConnection();

$karyawan = new Karyawan($db);
$karyawan->nama = $_POST['nama'];
$karyawan->posisi = $_POST['posisi'];
$karyawan->gaji = $_POST['gaji'];

$hasil = $karyawan->create();

if($hasil) {
    echo "Karyawan berhasil ditambahkan.";
} else {
    echo "Gagal menambahkan karyawan.";
}
?>