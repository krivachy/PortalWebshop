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

    /**
     * @param string $lekerdezes
     * @return mysqli_result
     */
    private function vegrehajtas(string $lekerdezes)
    {
        return $this->kapcsolat->egyLekeresVegrehajtasa($lekerdezes);
    }

    /**
     * @param int $felhasznalo
     * @return mysqli_result
     */
    public function kosarLekerese(integer $felhasznalo)
    {
        $l = "SELECT t.nev, t.ar, k.darab FROM KOSAR k INNER JOIN TERMEK t ON k.t_id = t.t_id WHERE k.f_id = " . $felhasznalo . " AND k.fizetve = false";
        return $this->vegrehajtas($l);
    }

    /**
     * @param int $felhasznalo
     * @param int $termek
     * @param int $darabszam
     * @return bool
     */
    public function kosarhozHozzaadas(integer $felhasznalo, integer $termek, integer $darabszam)
    {
        $feltetel = "WHERE k.f_id = " . $felhasznalo . " AND k.t_id = " . $termek;
        $ellenorzes = "SELECT * FROM KOSAR k " . $feltetel;
        $frissites = "UPDATE KOSAR SET darab = darab + " . $darabszam . " " . $feltetel;
        $beszuras = "INSERT INTO KOSAR(t_id, f_id, darab, fizetve) VALUES (" . $termek . "," . $felhasznalo . "," . $darabszam . ")";
        if ($this->vegrehajtas($ellenorzes)->num_rows > 0) {
            $this->vegrehajtas($frissites);
        } else {
            $this->vegrehajtas($beszuras);
        }
        return true;
    }
}