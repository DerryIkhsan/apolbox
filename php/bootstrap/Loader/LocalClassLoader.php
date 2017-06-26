<?php 
/*
 * The Local for Custom Loader Developer
 * 
 * (c) Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * 
 */
namespace Bootstrap\Loader;
/**
 * Kelas yang digunakan untuk memuat pustaka kelas yang dibuat oleh pengembang sendiri.
 * 
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @see https://github.com/apolbox/framework.git
 *
 */
class LocalClassLoader
{
	private $directory = "";
	private $namespaces = "";
	private $classMap = "";
	
	/**
	 * 
	 * @param string $prefix
	 * @param string $paths
	 * @param bool $prepend
	 */
	public function add( $prefix , $paths , $prepend = false )
	{
		$this->directory = $paths;
		$this->namespaces = $prefix;
	}
	
	/**
	 * 
	 * @param string $prepend
	 */
	public function register( $prepend = false )
	{
		spl_autoload_register(array($this,'loadClass'),true,$prepend);
	}
	
	/**
	 * 
	 * @param string $class
	 * @return method -> findFile($class)
	 */
	private function loadClass($class)
	{
		if (!defined('ROOT')) {
			define('ROOT', dirname(getcwd()) . DIRECTORY_SEPARATOR);
		}
		
		if (is_dir(ROOT . $this->directory)) {
			$pattern = preg_match( "/{$this->namespaces}\/", $class);
			if ($pattern) {
				$subject = str_replace($this->namespaces, trim($this->directory.'\\'), $class);
				$this->classMap = ROOT . strtr($subject, '/', DIRECTORY_SEPARATOR) . '.php';
			}
		}
		
		return $this->findfile( $this->classMap );
	}
	
	/**
	 * 
	 * @param string $class
	 */
	private function findFile( $class )
	{
		@includeFile( $class );
	}
}

/**
 * 
 * @param string $class
 */
function includeFile( $class ) {
    $class = str_replace('\\','/',$class);
    if (is_file($class)) @include($class);
    else throw new Exception("Tidak dapat menemukan file {$class}");
}

