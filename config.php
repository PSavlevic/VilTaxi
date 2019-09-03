<?php
//Sukuriamos konstantos. Jeigu mes norim projekta paleisti kitam serveri, tai butu paprasta keisti pagrindinius nustatymus.

//DIR grazina pilna patha iki vietos, kur jis buvo iskviestas
define('ROOT', __DIR__);
//Toliau mes galim naudot "DB_FILE" visam projekte, o ne rasyt visa kelia kiekviena karta.
define('DB_FILE', ROOT . '\app\data\db.txt');