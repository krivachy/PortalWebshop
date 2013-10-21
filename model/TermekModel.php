<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 21:50
 */

class TermekModel {

    /**
     * Azonosítója
     * @var int
     */
    public $id;
    /**
     * A termék neve
     * @var string
     */
    public $nev;
    /**
     * Leírása
     * @var string
     */
    public $leiras;
    /**
     * A termék ára, forintban.
     * @var int
     */
    public $ar;

    function __construct($id, $nev, $leiras, $ar)
    {
        $this->ar = $ar;
        $this->id = $id;
        $this->leiras = $leiras;
        $this->nev = $nev;
    }
}