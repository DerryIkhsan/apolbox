<?php

use Bootstrap\Loader\LocalClassLoader;
/*
 * Apolbox - Custom Loader Developer
 * 
 * Custom Loader Developer adalah script untuk mengakses kode sumber 
 * yang telah dibuat oleh pengembang itu sendiri.
 * 
 * (c) Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * 
 */
$localLoader = new LocalClassLoader();

/**
 * Menambahkan kelas yang akan dimuat.
 * 
 */
$localLoader->add('Pustaka\\','php/lib/framework/src/Pustaka');

/**
 * Mendaftarkan kelas local
 */
$localLoader->register();