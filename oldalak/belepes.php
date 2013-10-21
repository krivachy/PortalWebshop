<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 20:22
 *
 * Az oldal amelyik megjeleníti vagy a Belépés dobozt vagy a Kilépés funkciót.
 * Az App osztály kezeli le a be/kilépést.
 */

/** @noinspection PhpIncludeInspection */
include_once("app/App.php");

if (App::Authentikalva()) {
    print "<h2>Üdv, " . App::Felhasznalo()->nev . "!</h2>";
    ?>
    <!--suppress ALL -->
    <form action="index.php?p=kilepes_action" method="post">
        <input type="submit" value="Kilépés">
    </form>
<?php } else { ?>
    <h2>Belépés</h2>
    <form action="index.php?p=belepes_action" method="post">
        Felhasználónév: <input type="text" name="nev"><br>
        Jelszó: <input type="password" name="jelszo">
        <input type="submit" value="Belépés">
    </form>
<?php } ?>




