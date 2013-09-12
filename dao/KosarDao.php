<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:43
 */

include_once "app/DbKapcsolat.php";

class KosarDao
{

    private $kapcsolat;

    private $felhasznalo;

    function __construct(integer $felhasznalo, DbKapcsolat $kapcsolat)
    {
        $this->kapcsolat = $kapcsolat;
        $this->felhasznalo = $felhasznalo;
    }

    /**
     * @param string $lekerdezes
     * @return mysqli_result
     */
    private function vegrehajtas(string $lekerdezes)
    {
        return $this->kapcsolat->egyLekeresVegrehajtasa($lekerdezes);
    }

    /**
     * @return mysqli_result
     */
    public function kosarLekerese()
    {
        $l = "SELECT t.nev, t.ar, k.darab FROM KOSAR k INNER JOIN TERMEK t ON k.t_id = t.t_id WHERE k.f_id = " . $this->felhasznalo . " AND k.fizetve = false";
        return $this->vegrehajtas($l);
    }

    /**
     * @param int $termek
     * @param int $darabszam
     * @return bool
     */
    public function kosarhozHozzaadas(integer $termek, integer $darabszam)
    {
        $feltetel = "WHERE k.f_id = " . $this->felhasznalo . " AND k.t_id = " . $termek;
        $ellenorzes = "SELECT * FROM KOSAR k " . $feltetel;
        $frissites = "UPDATE KOSAR SET darab = darab + " . $darabszam . " " . $feltetel;
        $beszuras = "INSERT INTO KOSAR(t_id, f_id, darab, fizetve) VALUES (" . $termek . "," . $this->felhasznalo . "," . $darabszam . ")";
        if ($this->vegrehajtas($ellenorzes)->num_rows > 0) {
            $this->vegrehajtas($frissites);
        } else {
            $this->vegrehajtas($beszuras);
        }
        return true;
    }
}