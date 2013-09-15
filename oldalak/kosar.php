<h2>Kosár tartalma</h2>
<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:38
 */
include_once("app/App.php");

if (App::Authentikalva()) {
    $kosar = App::KosarDao();
    $elemek = $kosar->lekeres();
    if (count($elemek) == 0) {
        print "<p>Üres az ön kosara.</p>";
    } else {
        $ossz = 0;
        print "<div>";
        foreach ($elemek as $elem){
            $ossz += $elem->termek->ar * $elem->darab;
            $torles = '<form action="index.php?p=webshop" method="POST"><input type="hidden" name="torles_id" value="'.$elem->termek->id.'"><input type="submit" value="X"></form>';
            printf("<p>%s (%d Ft):<br />%d db %s</p>", $elem->termek->nev, $elem->termek->ar, $elem->darab, $torles);
        }
        print "</div>";
        print "<p>Összesen: ".$ossz." Ft</p>";
        print '<form action="index.php?p=webshop" method="POST"><input type="hidden" name="fizetes" value="true"><input type="submit" value="Fizetés"></form>';
    }
} else {
    print "<p>Csak belépett felhasználók számára látható.</p>";
}
?>
<img src="img/webshop_icon.png"/>