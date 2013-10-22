<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:43
 */

include_once "app/DbKapcsolat.php";
include_once "model/KosarElemModel.php";
include_once "model/TermekModel.php";

class KosarDao
{

    private $kapcsolat;

    private $felhasznalo;

    function __construct($felhasznalo, DbKapcsolat $kapcsolat)
    {
        $this->kapcsolat = $kapcsolat;
        $this->felhasznalo = $felhasznalo;
    }

    /**
     * @param string $lekerdezes
     * @return mysqli_result
     */
    private function vegrehajtas($lekerdezes)
    {
        return $this->kapcsolat->egyLekeresVegrehajtasa($lekerdezes);
    }

    /**
     * @return KosarElemModel[]
     */
    public function lekeres()
    {
        $l = "SELECT t.t_id, t.leiras, t.nev, t.ar, k.darab FROM KOSAR k INNER JOIN TERMEK t ON k.t_id = t.t_id WHERE k.f_id = " . $this->felhasznalo . " AND k.fizetve = false";
        $eredmeny = $this->vegrehajtas($l);
        if($eredmeny != null && $eredmeny != false){
            $result = array();
            while ($s = $eredmeny->fetch_assoc()) {
                $result[] = new KosarElemModel(new TermekModel($s["t_id"], $s["nev"], $s["leiras"], $s["ar"]), $s["darab"]);
            }
            $eredmeny->close();
            return $result;
        } else {
            return array();
        }
    }

    /**
     * @param int $termek
     * @param int $darabszam
     * @return bool
     */
    public function hozzaadas($termek, $darabszam)
    {
        $feltetel = "WHERE k.f_id = " . $this->felhasznalo . " AND k.t_id = " . $termek;
        $ellenorzes = "SELECT * FROM KOSAR k " . $feltetel;
        $frissites = "UPDATE KOSAR k SET darab = darab + " . $darabszam . " " . $feltetel;
        $beszuras = "INSERT INTO KOSAR(t_id, f_id, darab, fizetve) VALUES (" . $termek . ", " . $this->felhasznalo . ", " . $darabszam . ", false)";
        $ell = $this->vegrehajtas($ellenorzes);
        if ($ell != null && $ell != false && $ell->num_rows > 0) {
            $this->vegrehajtas($frissites);
        } else {
            $this->vegrehajtas($beszuras);
        }
        return true;
    }

    /**
     * @param $termek
     * @return bool
     */
    public function torles($termek) {
        $delete = "DELETE FROM KOSAR WHERE f_id = " . $this->felhasznalo . " AND t_id = " . $termek;
        $this->vegrehajtas($delete);
        return true;
    }
    public function fizetes(){
        $update = "UPDATE KOSAR SET fizetve = true where f_id = ". $this->felhasznalo;
        $this->vegrehajtas($update);
    }
}