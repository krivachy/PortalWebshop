<?php
/**
 * Author: K. Ákos
 * Date: 2013.09.15.
 * Time: 19:52
 *
 * Egy action amely lekezli a Kilépés funckió POST metódusát.
 * Paramétert nem kap.
 */

include_once("app/App.php");
App::FelhasznaloKilepes();
print "Sikeresen kilépett!";