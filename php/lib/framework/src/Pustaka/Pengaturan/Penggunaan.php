<?php 
/*
 * Apolbox - Penggunaan
 * 
 * (c) Ayus irfang filaras <ayus.sahabat@gmail.com>
 */
namespace Pustaka\Pengaturan;

use Pustaka\Pengaturan\Wizard\Editor;
use Pustaka\App\Bundle;
/**
 * 
 * @author ASUS-K40IJ
 *
 */
final class Penggunaan extends Editor
{
	/**
	 * 
	 * @return metode penyihir()
	 */
	public function __construct()
	{
		return $this->onCreate(new Bundle());
	}
}