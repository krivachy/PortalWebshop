<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 21:50
 */

class TermekModel {

    public $id;
    public $nev;
    public $leiras;
    public $ar;

    function __construct($id, $nev, $leiras, $ar)
    {
        $this->ar = $ar;
        $this->id = $id;
        $this->leiras = $leiras;
        $this->nev = $nev;
    }
}