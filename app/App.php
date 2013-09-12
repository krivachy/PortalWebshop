<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 0:14
 */
include_once "dao/KosarDao.php";
include_once "app/DbKapcsolat.php";
include_once "app/DbBeallitasok.php";

class App
{

    private static $kapcsolat = null;

    static private function Kapcsolat()
    {
        if (App::$kapcsolat == null) new DbKapcsolat(new DbBeallitasok());
        return App::$kapcsolat;
    }

    /**
     * @return KosarDao
     */
    static function KosarDao()
    {
        return new KosarDao(FelhasznaloId(), App::Kapcsolat());
    }

    /**
     * @return FelhasznaloDao
     */
    static function FelhasznaloDao()
    {
        return new FelhasznaloDao(App::Kapcsolat());
    }

    static function Authentikalva()
    {
        return isset($_COOKIE['user_id']);
    }

    static function setFelhasznaloNev(string $nev)
    {
        setcookie('neve', $nev);
    }

    static function FelhasznaloNev()
    {
        return $_COOKIE['neve'];
    }

    static function setFelhasznaloId(integer $id)
    {
        setcookie('user_id', $id);
    }

    static function FelhasznaloId()
    {
        return $_COOKIE['user_id'];
    }

}