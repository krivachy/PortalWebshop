<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 20:22
 */
include_once("app/App.php");

if (App::Authentikalva()){
    print "<h2>Üdv, ".App::FelhasznaloNev()."!</h2>";
} else { ?>
<h2>Belépés</h2>
    <form action="belepes_action.php" method="post">
        Felhasználónév: <input type="text" name="nev"><br>
        Jelszó: <input type="password" name="jelszo">
        <input type="submit" value="Belépés">
    </form>

<?php } ?>