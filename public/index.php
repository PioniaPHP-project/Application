<?php


/**
 * ---------------------------------------------------------------
 * Setup the application start time if not already defined
 * ---------------------------------------------------------------
 * >>>>>
 */
if (!defined('PIONIA_START')) {
    define('PIONIA_START', microtime(true));
}

/**
 * ---------------------------------------------------------------
 * Define the base path
 * ---------------------------------------------------------------
 * >>>>>
 */
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(__DIR__));
}

/**
 * >>>>>
 * --------------------------------------------------------------
 * Pionia Framework - The Restful Framework that feels restful!
 * --------------------------------------------------------------
 * >>>>>
 * This is the entry point of the application.
 *
 * It is responsible for booting the application and handling the incoming request.
 *
 * The application is bootstrapped by the application.php file in the bootstrap directory.
 *
 * The application.php file is responsible for booting the application and returning the application instance.
 *
 * >>>>>
 */
(require BASEPATH . '/bootstrap/application.php')
    // Boot the request kernel and handle the incoming request
    ->handleRequest();
