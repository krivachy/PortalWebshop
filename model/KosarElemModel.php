<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 21:49
 */

class KosarElemModel {

    /**
     * @var TermekModel
     */
    public $termek;
    /**
     * @var int
     */
    public $darab;

    function __construct(TermekModel $termek, $darab)
    {
        $this->darab = $darab;
        $this->termek = $termek;
    }


}