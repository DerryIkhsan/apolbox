<?php
/*
 *
 */
namespace Pustaka\Pengaturan\Wizard;

use Pustaka\App\Activity;
use Pustaka\App\Bundle;
/**
 * 
 */
abstract class Editor extends Activity
{    
    /**
     * 
     * {@inheritDoc}
     * @see \PHPCenter\App\Activity::onCreate()
     */
    public function onCreate(Bundle $saveInstance)
    {
        parent::onCreate($saveInstance);
    }
}