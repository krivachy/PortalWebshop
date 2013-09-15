<?php
//Session-bol kitudjuk venni az ilyen objektumot
require "model/FelhasznaloModel.php";
//Session inditasa
session_start();

$action = false;

if (isset($_GET['p']) && !preg_match('!^/|\.\./!', $_GET['p'])) {
    $p = $_GET['p'];
    $oldal = "oldalak/" . $p . ".php";

    $a = "_action";
    if (substr($p, -strlen($a)) === $a) {
        $action = true;
    }
} else {
    $oldal = "oldalak/webshop.php";
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/webshop.css">
</head>
<body>
<div id="wrapper">

    <div id="header">
        <h1><a href="index.php">Minimál Webshop</a></h1>
    </div>
    <div id="bal-oldal">
        <div id="belepes">
            <?php include_once("oldalak/belepes.php") ?>
        </div>

        <div id="regisztracio">
            <?php include_once("oldalak/regisztracio.php") ?>
        </div>
    </div>
    <div id="webshop">
        <?php
        if ($action) {
            print "<div id='action'>";
            include_once($oldal);
            print "</div>";
        } else {
            include_once($oldal);
        }
        ?>
    </div>
    <div id="kosar">
        <?php include_once("oldalak/kosar.php") ?>
    </div>

    <div id="footer">
        &copy; Copyright Webshop Kft. <?php print date('Y') ?>
    </div>

</div>

</body>
</html>
