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
  $buildProperties = getProjectDirectory() . '/build.properties';

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
    extractArrayToString( $konvertToArray, 'loadArrayIsFile' );
  }
}

function getProjectDirectory() {
  return dirname(__DIR__);
}

function extractArrayToString( $array, $commands ) {
    print_r( $array );
}

function loadArrayIsFile( $array ) {
    require getProjectDirectory() . $array;
}

return buildProject();
