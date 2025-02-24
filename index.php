<?php

/**
 * ==================
 * le routeur du site
 * ==================
 * @author Duval Tetsol <nzouekeuduval@gmail.com>
 * 
 */

use Core\Autoload;
use Core\src\Main;

// Constante qui contiendra le chemin vers dossier principales
define( 'ROOT', ( __DIR__ ) . DIRECTORY_SEPARATOR );

require_once ROOT . 'Autoload.inc.php';
// Charge automatiquement les classes
Autoload::register();

$Main = new Main();

$Main->start();

