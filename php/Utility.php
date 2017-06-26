<?php
/*
 * Apolbox - Utility
 * (c) Ayus irfang filaras <ayus.sahabat@gmail.com>
 */
use Pustaka\App\Aplikasi;
use Pustaka\Test\TestClassLocal;

/**
 * Menjalankan kelas Test Class Local
 * new TestClassLocal() berguna untuk menguji bahwa
 * kelas yang dibuat oleh pengembang dapat berjalan.
 * 
 * @since version 1.0.0
 */
//new TestClassLocal();

/**
 * Menjalankan kelas Aplikasi
 * 
 * Kelas aplikasi berguna untuk mengecek apakah Aplikasi
 * telah terinstall atau belum.
 * 
 * @return Pustaka\App\Aplikasi
 */
return Aplikasi::checkInstalled();

