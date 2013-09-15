<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 0:14
 */
include_once "dao/KosarDao.php";
include_once "dao/FelhasznaloDao.php";
include_once "dao/TermekDao.php";
include_once "app/DbKapcsolat.php";
include_once "app/DbBeallitasok.php";
include_once "model/FelhasznaloModel.php";

class App
{

    /**
     * @var DbKapcsolat
     */
    private static $kapcsolat = null;

    /**
     * @return DbKapcsolat
     */
    static private function Kapcsolat()
    {
        if (App::$kapcsolat == null){
            App::$kapcsolat = new DbKapcsolat(new DbBeallitasok());
        }

        return App::$kapcsolat;
    }

    /**
     * @return KosarDao
     */
    static function KosarDao()
    {
        $id = App::Felhasznalo()->f_id;
        return new KosarDao($id, App::Kapcsolat());
    }

    /**
     * @return FelhasznaloDao
     */
    static function FelhasznaloDao()
    {
        return new FelhasznaloDao(App::Kapcsolat());
    }

    static function TermekDao()
    {
        return new TermekDao(App::Kapcsolat());
    }

    /**
     * @return bool
     */
    static function Authentikalva()
    {
        //print($_SESSION['felhasznalo']);
        return !empty($_SESSION['felhasznalo']);
    }

    /**
     * @return FelhasznaloModel
     */
    static function Felhasznalo()
    {
        return $_SESSION['felhasznalo'];
    }

    static function FelhasznaloKilepes(){
        unset($_SESSION['felhasznalo']);
        session_destroy();
    }

    public static function FelhasznaloBelepes(FelhasznaloModel $felhasznalo)
    {
        $_SESSION['felhasznalo'] = $felhasznalo;
    }

}