<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.12.
 * Time: 20:07
 */

include_once "app/DbKapcsolat.php";
include_once "model/FelhasznaloModel.php";

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
     * @param $f_nev
     * @param $jelszo
     * @param $nev
     * @param bool $admin
     * @return FelhasznaloModel
     */
    function felhasznaloFelvetele($f_nev, $jelszo, $nev, $admin){
        $insert = "INSERT INTO FELHASZNALO(f_nev, jelszo, nev, admin) values ('".$f_nev."', '".$jelszo."', '".$nev."', ".$admin.")";
        $eredmeny = $this->kapcsolat->egyLekeresVegrehajtasa($insert);
        if(!$eredmeny) die('Nem sikerület felvenni a felhasználót!');
        else return $this->felhasznaloBeleptetese($f_nev, $jelszo);
    }

    /**
     * @param $f_nev
     * @param $jelszo
     * @return FelhasznaloModel
     */
    function felhasznaloBeleptetese($f_nev, $jelszo){
        $q = "SELECT f_id, f_nev, nev, admin FROM FELHASZNALO f WHERE f.f_nev = '".$f_nev."' AND f.jelszo = '".$jelszo."'";
        $eredmeny = $this->kapcsolat->egyLekeresVegrehajtasa($q);
        if($eredmeny != false && $eredmeny->num_rows == 1){
            $sor = $eredmeny->fetch_assoc();
            return new FelhasznaloModel($sor['f_id'], $sor['f_nev'], $sor['nev'], $sor['admin']);
        } else {
            return null;
        }
    }

    /**
     * @param $f_nev
     * @return bool
     */
    function felhasznaloEllenorzese($f_nev){
        $q = "SELECT f.f_id FROM FELHASZNALO f WHERE f.f_nev = ".$f_nev;
        $eredmeny = $this->kapcsolat->egyLekeresVegrehajtasa($q);
        if($eredmeny == false){
            return true;
        } else {
            return false;
        }
    }
}