#!/vendor;
<?php
/**
 * Apolbox - Autoload
 *
 * @package apolbox
 * @since version 1.0
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 */
@error_reporting(0);

// Menonaktifkan fungsi spl_autoload() standard.
@spl_autoload_register();

// Menonaktifkan __autoload() jika aktif.
if ( function_exists('__autoload') )
  @__autoload();

// Membuat kembali fungsi autoload
spl_autoload_register(function ( $class ) {
  
  // Mengembalikan type huruf dari __namespace__ ke huruf kecil.
  $class = strtolower( $class );
  
  // Mengubah backslash menjadi slash.
  $class = str_replace( "\\", "/", $class );
  
  // Membagi menjadi struktur array
  //$class = explode( "/", $class );
  
  // Mengecek apakah kelas adalah sebuah file.
  if ( file_exists( $class ) )
    require $class;
  else if ( file_exists( dirname(__DIR__) . "/{$class}" ) )
    require(dirname(__DIR__) . "/{$class}");
});
