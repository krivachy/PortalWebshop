<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:44
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