<?php
/**
 * Apolbox - SPL Autoload
 *
 * Dengan menggunakan spl autoload kita tidak perlu untuk memanggil file
 * satu persatu cukup dengan menggunakan fungsi yang sudah dibuilt-in oleh php yaitu:
 * example: use MY\CLASS\Classname;
 *
 * (c) Ayus irfang filaras
 */
spl_autoload_register(function($classname){
	$filename = str_replace('\\', '/', $classname).'.php';
	if (!file_exists($filename)) @exit("Tidak dapat menemukan file atau direktori.");
	@include $filename;
});
