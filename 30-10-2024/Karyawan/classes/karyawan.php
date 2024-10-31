<?php
class Karyawan {
    private $conn;
    private $table_name = "karyawan";

    public $id;
    public $nama;
    public $posisi;
    public $gaji;

    public function __construct($db) {
        $this->conn = $db;
        
    }
    // Read
    function read() {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();


        return $stmt;
    }

    function hasId($id) {
        $query = "SELECT * FROM" . $this->table_name . " WHERE id_karyawan=" . $id;

        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) return true;
        else return false;
    }

    function getLength() {
        $query = "SELECT COUNT(*) AS total FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }

    // Create
    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama=:nama, posisi=:posisi, gaji=:gaji";

        $stmt = $this->conn->prepare($query);

        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->posisi = htmlspecialchars(strip_tags($this->posisi));
        $this->gaji = htmlspecialchars(strip_tags($this->gaji));

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":posisi", $this->posisi);
        $stmt->bindParam(":gaji", $this->gaji);

        if ($stmt->execute()) {
            return $query;
        }

        return false;
    }

    function edit() {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, posisi=:posisi, gaji=:gaji WHERE id_karyawan=:id_karyawan";

        $stmt = $this->conn->prepare($query);

        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->posisi = htmlspecialchars(strip_tags($this->posisi));
        $this->gaji = htmlspecialchars(strip_tags($this->gaji));

        $stmt->bindParam(":id_karyawan", $this->id_karyawan);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":posisi", $this->posisi);
        $stmt->bindParam(":gaji", $this->gaji);

        if ($stmt->execute()) {
            return $query;
        }

        return false;
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_karyawan=:id_karyawan";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id_karyawan", $this->id_karyawan);
        if ($stmt->execute()) {
            return $query;
        }

        return false;
    }
}