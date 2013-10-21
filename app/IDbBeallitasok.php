<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 12:29
 */

/**
 * Class IDbBeallitasok
 * Több osztály implementálhatja a különböző adatbázisok elérése érdekében.
 */
interface IDbBeallitasok
{

    public function getSzerver();

    public function getFelhasznaloNev();

    public function getJelszo();

    public function getAdatbazis();

}