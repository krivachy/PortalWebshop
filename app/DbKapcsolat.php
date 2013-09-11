<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.11.
 * Time: 11:50
 */

class DbKapcsolat
{
    /**
     * @var IDbBeallitasok
     */
    private $dbbealliatasok;
    /**
     * @var mysqli
     */
    private $kapcsolat = null;

    function __construct(IDbBeallitasok $dbbealliatasok)
    {
        $this->dbbealliatasok = $dbbealliatasok;
    }

    private function kapcsolatLetrehozasa()
    {
        $this->kapcsolat = new mysqli(
            $this->dbbealliatasok->getSzerver(),
            $this->dbbealliatasok->getFelhasznaloNev(),
            $this->dbbealliatasok->getJelszo(),
            $this->dbbealliatasok->getAdatbazis());

        if ($this->kapcsolat->connect_errno) {
            die("Nem sikerült kapcsolódni a MYSQL szerverhez: (" . $this->kapcsolat->connect_errno . ") " . $this->kapcsolat->connect_error);
        }
    }

    /**
     * @return mysqli
     */
    private function getKapcsolat()
    {
        if ($this->kapcsolat == null) {
            $this->kapcsolatLetrehozasa();
        }
        return $this->kapcsolat;
    }

    function bontas()
    {
        if ($this->kapcsolat != null) {
            $this->kapcsolat->close();
            $this->kapcsolat = null;
        }
    }

    /**
     * @param string $lekerdezes
     * @return bool|mysqli_result
     */
    function egyLekeresVegrehajtasa(string $lekerdezes)
    {
        $eredmenyek = $this->lekeresVegrehajtasa($lekerdezes);
        $this->bontas();
        return $eredmenyek;
    }

    /**
     * @param string $lekerdezes
     * @return bool|mysqli_result
     */
    function lekeresVegrehajtasa(string $lekerdezes)
    {
        return $this->getKapcsolat()->query($lekerdezes);
    }
}