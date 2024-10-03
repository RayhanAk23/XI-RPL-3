<?php

class Motor {
    private $warna;
    private $merek;
    private $model;
    private $cc;
    
    public function __construct($warna, $merek, $model,$cc) {
        $this->warna = $warna;
        $this->merek = $merek;
        $this->model = $model;
        $this->cc = $cc;
    }

    public function bergerak() {
        echo "Motor bergerak\n";
        echo "<br>";
    }

    public function berhenti() {
        echo "Motor berhenti\n";
        echo "<br>";
    }

    public function berbelok() {
        echo "Motor berbelok\n";
        echo "<br>";
    }

    public function getWarna() {
        return $this->warna;
    }

    public function setWarna($warna) {
        $this->warna = $warna;
    }

    public function getMerek() {
        return $this->merek;
    }

    public function setMerek($merek) {
        $this->merek = $merek;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getCc() {
        return $this->cc;
    }

    public function setCc($Cc) {
        $this->cc = $Cc;
    }
}

$motor = new Motor("hijau","Honda","Vario","150cc",);

$motor->bergerak();
$motor->berhenti();
$motor->berbelok();

echo "Warna Motor: " . $motor->getWarna() . "\n";
echo "<br>";
$motor->setWarna("orange");
echo "Warna Motor setelah diubah: "  . $motor->getWarna() . "\n";
echo "<br>";

echo "Merek Motor: "  . $motor->getMerek() . "\n";
echo "<br>";
$motor->setMerek("Kawasaki");
echo "Merek Motor setelah diubah: "  . $motor->getMerek() . "\n";
echo "<br>";

echo "Model Motor: "  . $motor->getModel() . "\n";
echo "<br>";
$motor->setModel("Ninja SS");
echo "Merek Motor setelah diganti: "  . $motor->getModel() . "\n";
echo "<br>";

echo "cc Motor: "  . $motor->getCc() . "\n";
echo "<br>";
$motor->setCc("350cc");
echo "cc Motor setelah dibor up: "  . $motor->getCc() . "\n";
echo "<br>";
?>

