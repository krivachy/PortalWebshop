<?php

require_once "app/App.php";
function redirect(){
    header('Location: index.php');
    exit;
}

if(isset($_POST['t_id']) && isset($_POST['darab'])) {
    if(is_numeric($_POST['t_id']) && is_numeric($_POST['darab'])){
        App::KosarDao()->hozzaadas($_POST['t_id'], $_POST['darab']);
        redirect();
    }
}
if(isset($_POST['torles_id']) && is_numeric($_POST['torles_id'])){
    App::KosarDao()->torles($_POST['torles_id']);
    redirect();
}
if(isset($_POST['fizetes'])){
    App::KosarDao()->fizetes();
    redirect();
}
?>
<h2>Termékek</h2>
<div id="termekek">
<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 21:27
 */

    $termekek = App::TermekDao()->termekek();
    foreach($termekek as $termek) {
        print "<div id='termek'>";
        print "<h3>".$termek->nev."</h3>";
        print "<p>".$termek->leiras."</p>";
        print "<span>".$termek->ar." Ft</span>";
        if(App::Authentikalva()) {?>
            <form action="index.php?p=webshop" method="POST">
                <input type="hidden" name="t_id" value="<?php print($termek->id) ?>" />
                <label for="darab">Darab:</label> <input type="text" name="darab" size="3" maxlength="3">
                <input type="submit" value="+" width="10px">
            </form>
        <?php }
        print "</div>";
    }

?>

</div>