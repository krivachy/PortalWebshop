<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 21:49
 *
 * Egy Elem a kosárból.
 */

class KosarElemModel {

    /**
     * Melyik termék van a kosárban.
     * @var TermekModel
     */
    public $termek;
    /**
     * És hány darab van belőle.
     * @var int
     */
    public $darab;

    function __construct(TermekModel $termek, $darab)
    {
        $this->darab = $darab;
        $this->termek = $termek;
    }


}