<h2>Kosár tartalma</h2>
<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:38
 */
include_once("app/App.php");

if (App::Authentikalva()) {
    $felhasznalo = App::FelhasznaloId();
    $kosar = App::KosarDao();
    $elemek = $kosar->kosarLekerese($felhasznalo);
    if ($elemek->num_rows == 0) {
        print "<p>Üres az ön kosara.</p>";
    } else {
        while ($sor = $elemek->fetch_assoc()) {
            printf("<p>%s (%d Ft): %d db</p>", $sor["nev"], $sor["ar"], $sor["darab"]);
        }
    }
    $elemek->free();
} else {
    print "<p>Üres, kérjük lépjen be.</p>";
}
?>