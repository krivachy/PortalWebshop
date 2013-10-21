<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 20:44
 *
 * Egy Model osztály, amely tartalmazza egy belépett felhasználó adatait.
 */

class FelhasznaloModel
{
    /**
     * Azonosítója
     * @var int
     */
    public $f_id;
    /**
     * A felhasználó felhasználóneve :)
     * @var string
     */
    public $f_nev;
    /**
     * A felhasználó neve.
     * @var string
     */
    public $nev;
    /**
     * Admin-e a belépett felhasználó.
     * @var bool
     */
    public $admin;

    function __construct($f_id, $f_nev, $nev, $admin)
    {
        $this->admin = $admin;
        $this->f_id = $f_id;
        $this->f_nev = $f_nev;
        $this->nev = $nev;
    }

}