<?php

namespace Test;

use App\Index;
use Sekolah\Route;

class TestCase
{
	public function __construct()
	{
	    ini_set('display_errors',1);
	    $this->main();
	}
	
	function main()
	{
	    return new Route(1,4);
	}
}