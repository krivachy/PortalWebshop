<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 18:36
 */

include_once "app/App.php";

$sikertelen = "<p>Valami nem sikerült a regisztráció során. Kérjük próbálja meg megint.</p>";
$belepes_siker = false;

if (isset($_POST["f_nev"]) && isset($_POST["nev"]) && isset($_POST["jelszo"])) {
    $f_nev = $_POST["f_nev"];
    $nev = $_POST["nev"];
    $jelszo = $_POST["jelszo"];
    if(isset($_POST["admin"])) {
        $admin = "true";
    } else {
        $admin = "false";
    }

    if ($f_nev != "" && $jelszo != "") {
        $dao = App::FelhasznaloDao();
        if ($dao->felhasznaloEllenorzese($f_nev)) {
            $felhasznalo = $dao->felhasznaloFelvetele($f_nev, $jelszo, $nev, $admin);
            if ($felhasznalo != null) {
                App::FelhasznaloBelepes($felhasznalo);
                print "<p>Üdv az oldalon " . $nev . "!</p>";
                $belepes_siker = true;
            }
        }
    }
}

if (!$belepes_siker) print($sikertelen);