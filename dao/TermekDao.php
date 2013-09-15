<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 22:18
 */

class TermekDao {

    /**
     * @var DbKapcsolat
     */
    private $kapcsolat;

    function __construct(DbKapcsolat $kapcsolat)
    {
        $this->kapcsolat = $kapcsolat;
    }

    /**
     * @return TermekModel[]
     */
    public function termekek(){
        $q = "SELECT * FROM termek t order by t.nev";
        $eredmeny = $this->kapcsolat->egyLekeresVegrehajtasa($q);
        if($eredmeny != null && $eredmeny != false) {
            $result = array();
            while($s = $eredmeny->fetch_assoc()) {
                $result[] = new TermekModel($s['t_id'],$s['nev'],$s['leiras'],$s['ar']);
            }
            return $result;
        } else {
            return array();
        }
    }
}