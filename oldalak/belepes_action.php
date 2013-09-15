<?php
include_once "app/App.php";

$siker = 'Location: index.php';
$sikertelen = "<p>Nem sikerült belépni. Kérjük próbálja meg megint.</p>";
$nev = $_POST["nev"];
$jelszo = $_POST["jelszo"];
if (isset($nev) && isset($jelszo) && $nev != "" && $jelszo != "") {
    $felhasznalo = App::FelhasznaloDao()->felhasznaloBeleptetese($nev, $jelszo);
    if ($felhasznalo != null) {
        App::FelhasznaloBelepes($felhasznalo);
        print("Sikeres a belépés!");
    } else {
        print($sikertelen);
    }
} else {
    print($sikertelen);
}