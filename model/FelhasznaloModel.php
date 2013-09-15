<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 20:44
 */

class FelhasznaloModel
{
    /**
     * @var int
     */
    public $f_id;
    /**
     * @var string
     */
    public $f_nev;
    /**
     * @var string
     */
    public $nev;
    /**
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