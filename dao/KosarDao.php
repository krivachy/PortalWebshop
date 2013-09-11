<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:43
 */

class KosarDao
{

    private $kapcsolat;

    function __construct(DbKapcsolat $kapcsolat)
    {
        $this->kapcsolat = $kapcsolat;
    }

    private function vegrehajtas(string $lekerdezes){
        $this->kapcsolat->egyLekeresVegrehajtasa($lekerdezes);
    }

    public function kosarLekerese(integer $felhasznalo){
        $l = "SELECT * FROM KOSAR k WHERE k.f_id = ?" . $felhasznalo;
        return $this->vegrehajtas($l);
    }
    public function kosarhozHozzaadas(Termek $termek, integer $darabszam){

    }
}