<?php
include_once "../app/App.php";

if( $_POST["nev"] && $_POST["jelszo"] )
{
    $felhasznalo = App::FelhasznaloDao()->felhasznaloBeleptetese($_POST['nev'], $_POST['jelszo']);
    if($felhasznalo != null){
        App::setFelhasznaloId($felhasznalo->f_id);
        App::setFelhasznaloNev($felhasznalo->nev);
    }
}
header('Location: '.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI'])."../index.php");
exit;