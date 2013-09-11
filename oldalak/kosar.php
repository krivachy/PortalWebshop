<h2>Kosár tartalma</h2>
<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:38
 */
if (App::Authentikalva()){
    $felhasznalo = App::FelhasznaloId();
    $kosar = App::KosarDao();
    $elemek = $kosar->kosarLekerese($felhasznalo);
    while ($sor = $elemek->fetch_assoc()) {
        printf("<p>%s (%d Ft): %d db</p>", $sor["nev"], $sor["ar"], $sor["ar"]);
    }
    $elemek->free();
} else {
    print "<p>Üres, kérjük lépjen be.</p>";
}
?>