<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ejkosz
 * Date: 2013.09.12.
 * Time: 0:14
 * To change this template use File | Settings | File Templates.
 */

class App {

    /**
     * @return KosarDao
     */
    static function KosarDao(){
        return new KosarDao(new DbKapcsolat(new DbBeallitasok()));
    }

    static function Authentikalva(){
        return isset( $_COOKIE['user_id'] );
    }
    static function FelhasznaloId(){
        return $_COOKIE['user_id'];
    }

}