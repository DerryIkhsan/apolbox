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
spl_autoload_register('loadClass');

/**
 * Fungsi untuk memuat kelas
 * @var string/object $classname
 */
function loadClass($classname) {
	$classname = str_replace(
		"\\",
		"/",
		"{$classname}.php"
	);

	if (!file_exists($classname)) @exit("Tidak dapat menemukan file atau direktori.");
	else if (is_dir($classname)) @exit("Ini adalah direktori");
	else @include $classname;
}