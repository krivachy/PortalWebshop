<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:44
 */
include_once "IDbBeallitasok.php";

/**
 * Class DbBeallitasok
 * Implementálja az IDbBeallitasok interfészt.
 * Megadja a szerver kapcsolódási információit.
 */
class DbBeallitasok implements IDbBeallitasok
{

    public function getSzerver()
    {
        return "localhost";
    }

    public function getFelhasznaloNev()
    {
        return "root";
    }

    public function getJelszo()
    {
        return "";
    }

    public function getAdatbazis()
    {
        return "portaltech";
    }
}