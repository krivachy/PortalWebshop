# Portáltechnológia Webshop

Corvinus 2SZ31NDK02B tárgyra készült.

## Leírás
Egy egyszerű webshop, amely egy összetett PHP alkalmazás modellezést kivánja bemutatni.

## English description
Create a simple PHP webshop, to demo a multi layered PHP application. Please don't actually use this, because it has a couple of major holes, e.g.: storing passwords in cleartext, vulnerable to MYSQL injection, etc.

## A program elinditása
1. Kell hozzá: PHP 5.4+ és MYSQL szerver.
1. Ha nincs létrehozva még adatbázis, akkor le kell futtatni a `ddl/adatbazis.sql` fájlt a MYSQL szerveren.
1. Ezek után le kell futtatni a `ddl/letrehozas.sql` fájlt.
1. Ha kell egy-két teszt adat, akkor a `ddl/test_adat.sql` fájlt is.
1. Át kell írni az `app/DbBeallitasok.php`-ben a MYSQL beállításokat vagy implementálni az `IDbBeallitasok` interfészt.

## Felépítés
* Négy részből áll:
* `model` mappában lévő osztályok egyszerű osztályok, amelyek tartalmazzák az adatbázis objektumorientált leírását.
* `dao` mappában lévő "Data Access Object"-ok, amelyekkel végrehajtjuk az SQL lekérdezéseket és berakjuk az eredményeket a model osztályokba.
* `app` mappában összerakásra kerül minden kapcsolat és minden DAO, illetve itt történik a jogosultságkezelés.
* `oldalak` mappában vannak maguk a kiszolgálandó PHP fájlok a webshophoz.

***

## Javitandó részek:
* Jelszó/felhasználó kezelés: Hashelt jelszavakat kéne tárolni.
* Belépés és regisztráció nem követi a post/redirect/get metódológiát. (További info: http://en.wikipedia.org/wiki/Post/Redirect/Get)
* SQL injection: Mindenhol validálni a bemenetet, illetve paraméterezett lekérdezéseket végrehajtni: http://php.net/manual/en/mysqli.prepare.php
* Admin felhasználó értelmesebb kezelése.
* Termékeket felvenni és törölni.

