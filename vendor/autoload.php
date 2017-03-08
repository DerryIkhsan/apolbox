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
  
  // Cek __NAMESPACE__
  
});
