<?php
/*
 * Apolbox - Framework Productiont
 * (c) Ayus irfang filaras <ayus.sahabat@gmail.com>
 */
@include 'util.php';
/**
 * Apolbox - Framework Productiont
 * Apolbox adalah situs kerangka kerja untuk membangun situs web.
 *
 * @package apolbox
 * @subpackage administrator
 *
 * @copyright (c) [29 Juni 2016]
 * @since version 1.0
 *
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @url git clone https://github.com/apolbox/apolbox.git
 *
 * @lisence https://apolbox.com/license.txt
 */
final class Application extends \PHP\Utilities\System
{
	// TODO: Tidak ada metode yang dideklarasikan
}
/**
 * Memulai aplikasi
 *
 * @var Application $Apolbox
 */
$Apolbox = new Application();
return $Apolbox->start();
