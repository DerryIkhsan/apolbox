<?php
/**
 * Apolbox - API Functions
 *
 * API Functions adalah kumpulan fungsi - fungsi yang dibuat oleh pengembang sendiri.
 *
 * @author Ayus irfang filaras <ayus.sahabat@gmail.com>
 */
namespace PHP\Utilities;
/**
 *
 * @param array $direktori
 * @param string $kunci
 * @return string
 */
function changeDirectory($directory,$key)
{
	if (!is_array($directory)) $directory = scandir($directory);
	for ($i = 0; $i < count($directory); $i++)
	{
		if ($key === $directory[$i])
		{
			if (!is_dir(root().$directory[$i]))
			{
				return DIRECTORY_SEPARATOR.$directory[$i];
			}
			return root().$directory[$i];
		}
	}
}

/**
 * 
 * @return string
 */
function listDirectory()
{
	$directory = scandir(getcwd());
	for ($i=2;$i<count($directory);$i++)
	{
		printf("%s<br/>",$directory[$i]);
	}
}

/**
 *
 * @return string
 */
function root()
{
	return dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR;
}

/**
 *
 * @param string $filename
 */
function execute($filename)
{
	$filename = scandir($filename);
	for ($i = 2; $i < count($filename); $i++)
	{
		if (is_file($filename[$i])) @import($filename[$i]);
	}
}

/**
 * 
 * @param string $classname
 */
function import($classname)
{
	@include($classname);
}

