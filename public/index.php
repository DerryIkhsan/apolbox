<?php
/**
 * Apolbox - Framework Productiont
 *
 * Apolbox adalah situs kerangka kerja untuk membangun situs web,
 * dan juga sebagai aplikasi jejaring untuk sarana informasi, pertemanan dan cinta.
 *
 * @package apolbox
 * @subpackage administrator
 *
 * @copyright (c) [29 Juni 2016]
 * @since version 1.0
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @url git clone https://github.com/apolbox-project/apolbox.git
 *
 * @lisence https://apolbox.com/license.txt
 */
function buildProject() {

  // cek build.properties
  $buildProperties = getPublicDirectory( '/public' ) . '/build.properties';
  $settingsProperties = getPublicDirectory( '/public' ) . '/settings.properties';

  // File build.properties adalah file berformat json
  // kita akan mengkonvert menjadi sebuah array+.
  // Membuka file build.properties
  if ( $openBuildProperties = fopen( $buildProperties, 'r+' ) ) {
    // Setelah terbuka sekarang saatnya membaca isi file.
    $readBuildProperties = fread( $openBuildProperties, 4096 );

    // Konvert isi build.properties menjadi sebuah array
    // menggunakan fungsi json_decode
    $konvertToArray = json_decode( $readBuildProperties, true );

    // Setelah menjadi file array saatnya membongkar isi dari array.
    // dan mencoba untuk memuat isi dari array.
    extractArrayToString( $konvertToArray );
  }
  
  // Membuka settings.properties
  if ( $openSettingsProperties = fopen( $settingsProperties, 'r+' ) ) {
      // Membaca settings.properties
      $readSettingsProperties = fread( $openSettingsProperties, 4096 );
      
      //var_dump( $readSettingsProperties );
  }
  
  // Menutup semua setelah dibuka.
  fclose( $openBuildProperties );
  fclose( $openSettingsProperties );
}

// Setup project directory
function getProjectDirectory() {
  return dirname(__DIR__);
}

// Setup project public
function getPublicDirectory( $public = null ) {
	// Cek apakah folder $public ada
	if ( is_dir( getProjectDirectory() . $public ) ) {
		return getProjectDirectory() . $public;
	}
	return getProjectDirectory();
}

// Extrack array menjadi string
function extractArrayToString( $array, $commands = null ) {
    try {
        // Jika $array bukan sebuah array dan $array tidak dalam array
        // maka laporkan error compiler file gagal.
        if ( ! is_array( $array ) && ! in_array( $array ) ) {
            throw new Exception("Compiler file gagal.", 1);
        }

        // mencari kata kunci repositories di dalam array
        if ( array_key_exists( 'repositories' , $array ) ) {
            // Cek fungsi repositories sudah ada.
            // jika tidak ada laporkan error compiler repositories failed.
            if ( ! function_exists( 'repositories' ) ) {
                throw new Exception("Compiler repositories failed.", 1);
            }
            repositories( $array['repositories'] );
        }

        // Mencari kata kunci allProject di dalam array
        if ( array_key_exists( 'allProject', $array ) ) {
            // Cek fungsi allProject sudah ada.
            // jika tidak ada laporkan error compiler project failed.
            if ( ! function_exists( 'allProject') ) {
                throw new Exception("Compiler project failed", 1);
            }
            allProject( $array['allProject'] );
        }
    } catch (Exception $e) {
        printf( "Error on line %s", $e->getLine() );
        printf( "\rin %s", $e->getFIle() );
        printf( "\r: %s", $e->getMessage() );

        return false;
    }

}

function repositories( $repo ) {
    // extract repo and checking
    foreach ($repo as $key => $value) {
        try {
            // checking function on key
            if ( ! function_exists( $key ) ) {
                throw new Exception("Fungsi $key tidak dapat dimuat. <br/>", 1);
            }
            $key( $repo[$key] );
        } catch (Exception $e) {
            printf( "Error on line %s", $e->getLine() );
            printf( "\rin %s", $e->getFIle() );
            printf( "\r: %s", $e->getMessage() );

            return false;
        }
    }
}

function allProject( $project ) {
    // $project adalah sebuah fungsi untuk mengakses
    // semua project yang sedang dibuat.
    if ( is_array( $project ) ) {
        //print_r( $project );
    }
}

function package( $packagist ) {
    // Mengubah variabel $packagist menjadi sebuah direktori.
    $package = str_replace( '.', '/', $packagist );
    
    if ( function_exists( 'main' ) ) {
        return main( $package );
    }
    return false;
}

function vendor( $vendor ) {
    //var_dump( $vendor );
}

function main( string $args ) {
    
    try {
        
        $mainDirectory = getProjectDirectory() . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . $args;
        $autoload = '/autoload.php';
        
        if ( is_dir( $mainDirectory ) ) {
            require $mainDirectory . $autoload;
        }
        else {
            unset( $mainDirectory );
            
            $mainDirectory = dirname( getProjectDirectory() ) . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . $args;
            
            if ( ! is_dir( $mainDirectory ) ) {
                throw new Exception("No package $args", 1);
            }
            require $mainDirectory . $autoload;
        }
    } catch (Exception $e) {
        printf( "Warning: %s ", $e->getMessage() );
        printf( "in file %s ", $e->getFile() );
        printf( "line : %s", $e->getLine() );
    }
}

return buildProject();



