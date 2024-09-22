<?php

use Pionia\Base\PioniaApplication;

/**
 * ---------------------------------------------------------------
 * APPLICATION & CONTAINER SETUP
 * ---------------------------------------------------------------
 *
 * This file is the entry point for the application. It is responsible for
 * bootstrapping the application and returning the application instance.
 *
 * You can hook into the application lifecycle by adding your code here.
 * Multiple hooks are available for you to use.
 *
 * i) withCacheAdaptor(callable $callback) : This can be used to register a different cache adaptor.
 * By default, the application uses the file cache adaptor. All symfony cache adaptors are supported.
 *
 * ii) setLogger(LoggerInterface $logger) : This can used to set a custom logger for the application.
 * By default, the application uses the Monolog logger.
 *
 * iii) booted(Closure $closure) : This can be used to register a callback to be run after the application is booted.
 * This method can be called multiple times to add more hooks.
 *
 * iv) booting(Closure $callback) : This can be used to register hooks to mutate the application booting cycle.
 * Runs before the application is booted. Can be called multiple times to add more hooks.
 *
 * v) terminating(Closure $callback) : This can be used to register the application's terminating hooks.
 * All logic that needs to run before the application is terminated. Can be called multiple times to add more hooks.
 *
 * vi) terminated(Closure $closure) : This can be used to register the application's terminated hook listeners.
 * All logic that needs to run after the application is terminated. Can be called multiple times to add more hooks.
 *
 * Container bindings can be added here as well.
 *
 * ---------------------------------------------------------------
 *
 * The application instance is returned at the end of the file.
 *
 * >>>>>
 */


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
 * ---------------------------------------------------------------
 * Load the composer autoloader
 * ---------------------------------------------------------------
 * >>>>>
 */
include BASEPATH.'/vendor/autoload.php';

/**
 * ---------------------------------------------------------------
 * Create the application instance
 * ---------------------------------------------------------------
 * >>>>>
 */
$app = new PioniaApplication(BASEPATH);

/**
 * ---------------------------------------------------------------
 * Register the application's lifecycle hooks
 * ---------------------------------------------------------------
 * >>>>>
 */
/**
 * ---------------------------------------------------------------
 * Hooks here run before the application is booted
 * Can be called multiple times to add more hooks
 * They have no access to the application instance
 * ---------------------------------------------------------------
 */
$app->booting(function () {
    // Add your booting hooks here
});

/**
 * ---------------------------------------------------------------
 * Hooks here run after the application is booted
 * Can be called multiple times to add more hooks
 * They have access to the application instance
 * ---------------------------------------------------------------
 */

$app->booted(function (PioniaApplication $app) {
    // Add your booted hooks here
});

/**
 * ---------------------------------------------------------------
 * Hooks here run before the application is terminated
 * Can be called multiple times to add more hooks
 * They have access to the application instance
 * ---------------------------------------------------------------
 */
$app->terminating(function (PioniaApplication $app) {
    // Add your terminating hooks here
});

/**
 * ---------------------------------------------------------------
 * Hooks here run after the application is terminated
 * Can be called multiple times to add more hooks
 * They have no access to the application instance
 * ---------------------------------------------------------------
 */
$app->terminated(function () {
    // Add your terminated hooks here
});

/**
 * ---------------------------------------------------------------
 * Add Middlewares to the application
 * ---------------------------------------------------------------
 * This method is used to add middlewares to the application.
 * >>>>>
 *
 */
//$app->addMiddleware();

/**
 * ---------------------------------------------------------------
 * Add aliases to the application
 * ---------------------------------------------------------------
 * This method is used to add an alias to the application.
 *
 * This can be later accessed using the `alias($name)` function.
 * >>>>>
 */
//$app->addAlias($aliasName, $aliasValue);

/**
 * ---------------------------------------------------------------
 * Return the application instance
 * ---------------------------------------------------------------
 * This must stay as the last line of the file.
 * >>>>>
 */
return $app;
