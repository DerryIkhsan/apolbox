<?php
/*
 * Apolbox - System
 * (c) Ayus irfang filaras <ayus.sahabat@gmail.com>
 */
namespace PHP\Utilities;
/**
 * 
 * @author ASUS-K40IJ
 *
 */
abstract class System extends Konfigurasi
{
	/**
	 *
	 * @var string
	 */
	const PHP_DIREKTORI = "";
	
	/**
	 *
	 * @var array
	 */
	private $phpDirektori = array();
	
	/**
	 *
	 * @var array
	 */
	private $classMap = array();
	
	/**
	 *
	 * @return method pusatSistem()
	 */
	public function __construct() {}
	
	/**
	 *
	 */
	public function start()
	{
		return $this->systemCenter();
	}
	
	/**
	 *
	 */
	private function systemCenter()
	{
		if (!empty(self::PHP_DIREKTORI)) {
			return;
		}
		$filename = scandir(home());
		$this->getOnlyDirectory($filename);
		
		$phpdir = changeDirectory($this->phpDirektori, 'php');
		$bootstrap = changeDirectory($phpdir, 'bootstrap');
		$library = changeDirectory($phpdir, 'lib');
		
		if (chdir($phpdir) && chdir($phpdir.$bootstrap)) @execute(getcwd());
		if (chdir($phpdir) && chdir($phpdir.$library)) @execute(getcwd());
		if (chdir($phpdir)) @execute(getcwd());
	}
	
	/**
	 *
	 * @param array $filename
	 */
	private function getOnlyDirectory(array $filename)
	{
		// var_dump($filename);
		$i = 2;
		for ($i; $i < count($filename); $i++)
		{
			if ($not_directory = is_file($filename[$i]))
			{
				unset($not_directory);
				continue;
			}
			$this->phpDirektori = array_merge($this->phpDirektori,(array) $filename[$i]);
		}
	}
}


