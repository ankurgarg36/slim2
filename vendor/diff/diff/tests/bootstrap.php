<?php

/**
 * PHPUnit bootstrap file for the Diff library.
 *
 * @license GPL-2.0+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

if ( PHP_SAPI !== 'cli' ) {
	die( 'Not an entry point' );
}

if ( !is_readable( __DIR__ . '/../vendor/autoload.php' ) ) {
	die( 'You need to install this package with Composer before you can run the tests' );
}

$classLoader = require __DIR__ . '/../vendor/autoload.php';

$classLoader->addPsr4( 'Diff\\Tests\\', __DIR__ . '/phpunit/' );

unset( $classLoader );
