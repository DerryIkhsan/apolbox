<?php
/**
 * Apolbox - Autoload
 * 
 * Autoload adalah file untuk memuat kelas secara global,
 * sesuai deklarasi namespace dari sebuah file kelas.
 * 
 * @package apolbox
 * @since version 0.1
 * 
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 */
require 'autoload.class.php';

// Turn on
$autoload = new Autoload();
return $autoload->loadClassBySplAutoload();
