<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 20:07
 */

include_once "app/DbKapcsolat.php";

class FelhasznaloDao
{

    /**
     * @var DbKapcsolat
     */
    private $kapcsolat;

    /**
     * @param DbKapcsolat $kapcsolat
     */
    function __construct(DbKapcsolat $kapcsolat)
    {
        $this->kapcsolat = $kapcsolat;
    }

    /**
     * @param string $f_nev
     * @param string $jelszo
     * @param string $nev
     * @param bool $admin
     */
    function felhasznaloFelvetele(string $f_nev, string $jelszo, string $nev, boolean $admin){
        $insert = "INSERT INTO felhasznalo(f_nev, jelszo, nev, admin) values (".$f_nev.", ".$jelszo.", ".$nev.", ".$admin.")";
        $eredmeny = $this->kapcsolat->egyLekeresVegrehajtasa($insert);
        if(!$eredmeny) die('Nem sikerület felvenni a felhasználót!');
    }

    /**
     * @param string $f_nev
     * @param string $jelszo
     * @return FelhasznaloModel
     */
    function felhasznaloBeleptetese(string $f_nev, string $jelszo){
        $q = "SELECT f.f_id, f.f_nev, f.nev, f.admin FROM felhasznalo f WHERE f.f_nev = ".$f_nev." AND f.jelszo = ".$jelszo;
        $eredmeny = $this->kapcsolat->egyLekeresVegrehajtasa($q);
        if($eredmeny->num_rows == 1){
            $sor = $eredmeny->fetch_assoc();
            return new FelhasznaloModel($sor['f_id'], $sor['f_nev'], $sor['nev'], $sor['admin']);
        } else {
            return null;
        }
    }
}