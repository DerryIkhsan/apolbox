<?php
/**
 * Apolbox - Class Autoload
 *
 * Kelas autoload memungkinkan kita untuk memanggil kelas lainnya,
 * dengan metode namespace dan use it.
 *
 * @package apolbox
 * @since version 0.1
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 */
//require 'utilities.php';

final class Autoload
{
    // Properti file $autoload yang di gunakan oleh Autoload dari composer.
    protected $autoload = '/autoload.php';
    
    // Metode yang akan di akses pertama kali oleh kelas Autoload
    final public function __construct()
    {
        // Mengecek folder vendor jika sudah ada
        // Untuk memuat Autoload yang di buat oleh composer.
        $vendor = getProjectDirectory() . DIRECTORY_SEPARATOR . '/vendor';
        
        if ( is_dir( $vendor ) ) {
            if ( file_exists( $vendor . $this->autoload ) ) {
                require $vendor . $this->autoload;
            }
            return false;
        }
        spl_autoload_register( 'Autoload', 'loadClassBySplAutoload' );
    }
    
    // fungsi yang digunakan oleh spl_autoload_register()
    final protected function loadClassBySplAutoload( $arguments )
    {
        // Test execute arguments
        if ( class_exists( $arguments )  )
        {
            return $arguments;
        }
        require $arguments;
    }
}
