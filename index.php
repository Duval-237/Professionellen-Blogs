<?php

/**
 * ==================
 * le routeur du site
 * ==================
 * @author Duval Nzouekeu <nzouekeuduval@gmail.com>
 * 
 */

use Core\Autoload;
use Core\src\Main;

// Constante qui contiendra le chemin vers dossier principales
define( 'ROOT', ( __DIR__ ) . DIRECTORY_SEPARATOR );

// Pour trouver les erreur due a l'affichage
// ini_set( 'display_errors', 1 );
// error_reporting( E_ALL );

require_once ROOT . 'Autoload.inc.php';
// Charge automatiquement les classes
Autoload::register();

$Main = new Main();

$Main->start();

