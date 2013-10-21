<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 0:14
 */

/**
 * Az App osztály összefogja az alkalmazásunkat.
 * A metódusai mind statikusak, tehát az App::method szintaxissal lehet őket meghívni.
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
     * A kérés során használat adatbázis kapcsolat.
     * Azért tároljuk el, hogy egy kérés során ne nyissunk több adatbázis kapcsolatot.
     * @var DbKapcsolat
     */
    private static $kapcsolat = null;

    /**
     * Figyeli, hogy van-e már létező kapcsolat és ha van akkor azt adja vissza.
     * Ha nincs akkor újat hoz létre.
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
     * A belépett felhasználó kosarának adatelérési objektumát adja vissza.
     * @return KosarDao
     */
    static function KosarDao()
    {
        $id = App::Felhasznalo()->f_id;
        return new KosarDao($id, App::Kapcsolat());
    }

    /**
     * A felhasználó kezelési műveleteknek az adatelérési objektumát adja vissza.
     * @return FelhasznaloDao
     */
    static function FelhasznaloDao()
    {
        return new FelhasznaloDao(App::Kapcsolat());
    }

    /**
     * A termékek adatelérési objektumát adja vissza.
     * @return TermekDao
     */
    static function TermekDao()
    {
        return new TermekDao(App::Kapcsolat());
    }

    /**
     * Ellenőrzi, hogy bevan-e lépve a felhasználó.
     * @return bool
     */
    static function Authentikalva()
    {
        return !empty($_SESSION['felhasznalo']);
    }

    /**
     * Visszatér a belépett felhasználó modeljével.
     * @return FelhasznaloModel
     */
    static function Felhasznalo()
    {
        return $_SESSION['felhasznalo'];
    }

    /**
     * Kilépteti a felhasználót.
     */
    static function FelhasznaloKilepes(){
        unset($_SESSION['felhasznalo']);
        session_destroy();
    }

    /**
     * Belépetet egy felhasználót egy model alapján.
     * @param FelhasznaloModel $felhasznalo
     */
    public static function FelhasznaloBelepes(FelhasznaloModel $felhasznalo)
    {
        $_SESSION['felhasznalo'] = $felhasznalo;
    }

}