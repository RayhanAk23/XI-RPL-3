<?php
//classes/User.php

require_once './config/connect.php';

class User {
  private $conn;
  private $table_name = "users";

  public function __construct($db) {
  $this->conn = $db;
  }

  public function hasUsername($username) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";   
    //memepersiapkan statement untuk query di atas
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
  
    // Jika ada data user yang sesuai dengan username yang di input
    if($stmt->rowCount() > 0) return true;
    return false;
  }

  public function login($username, $password) {
  //query untuk mengambil data user yang sesuai dengan username yang di input
  $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";   
  //memepersiapkan statement untuk query di atas
  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(":username", $username);
  $stmt->execute();

  // Jika ada data user yang sesuai dengan username yang di input
  if($stmt->rowCount() > 0) {
  // ambil data user yang diinput sesuai username yang di input
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  // jika password yang diinput sesuai dengan password yang
  if(password_verify($password, $row['PASSWORD'])) {
  // kembalikan true
  session_start();
  $_SESSION['username'] = $username;
    return true;
      }
    }
    // Kembalikan false jika tidak ada data user yang sesuai dengan username yang diinput atau password yang di input tidak sesuai dengan password yang tersimpan di database
    return false;
  }

  //fungsi untuk menambahkan user baru
  public function register($username, $password) {
    if ($this->hasUsername($username)) return false;
    $query = "INSERT INTO " . $this->table_name . " (username, password) VALUES (:username, :password)";
    $stmt = $this->conn->prepare($query);

    //enkripsi password sebelum di simpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashed_password);

    if($stmt->execute()) {
      return true;
    }
    return false;

  }
}