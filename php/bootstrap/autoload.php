<?php
use function PHP\Utilities\getDirectory;
use function PHP\Utilities\import;
/*
 * Managament untuk mengakses kode sumber aplikasi.
 * 
 * (c) Ayus irfang filaras <ayus.sahabat@gmail.com>
 */
define('APOLBOX_START', microtime());

try
{
	/**
	 * Register The Composer Auto loader
	 *
	 * Memuat kelas yang telah terdaftar di Composer Auto Loader.
	 *
	 * @since version 1.0.0
	 *
	 */
	if (!file_exists(getDirectory().'vendor/autoload.php')) throw new \Exception("Tidak dapat memuat file " . str_replace('\\', '/', getDirectory().'vendor/autoload.php'));
	else if (file_exists(getDirectory().'vendor/autoload.php')) @import(getDirectory().'vendor/autoload.php');
	
	/**
	 * Register The Class Loader Developer
	 * 
	 * Memuat kelas yang telah di buat oleh pengembang secara external.
	 * 
	 * @since version 1.0.0
	 * 
	 */
	if (!file_exists('Loader/LocalClassLoader.php')) throw new \Exception("Tidak dapat memuat file " . str_replace('\\', '/', 'Loader/LocalClassLoader.php'));
	else if (file_exists('Loader/LocalClassLoader.php')) @import('Loader/LocalClassLoader.php');

} catch (Exception $e) {
	printf('
		<div style="background: red; color: white; margin: 15px auto; padding: 12px; box-shadow: 0 0 2px rgb(243, 243, 243);">
			<code><b>Warning: </b>%s dibaris [%u] dari file %s</code>
		</div>',
		$e->getMessage() , $e->getLine() , $e->getFile()
	);
}