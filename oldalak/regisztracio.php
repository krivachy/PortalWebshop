<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 18:27
 */

include_once("app/App.php");

if (!App::Authentikalva()) {
    ?>
    <h2>Regisztráció</h2>
    <form action="index.php?p=regisztracio_action" method="post">
        Felhasználónév: <input type="text" name="f_nev"><br />
        Név: <input type="text" name="nev"><br />
        Jelszó: <input type="password" name="jelszo"><br />
        Admin: <input type="checkbox" name="admin"><br />
        <input type="submit" value="Regisztráció">
    </form>

<?php } ?>