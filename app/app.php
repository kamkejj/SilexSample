<?php
/**
 * File app.php
 *
 * @author Jon Kamke <jon@kamke.org>
 */
use Silex\Application;

/**
 * The default web environment is 'prod'.
 * To run in development mode set the APPLICATION_ENV environment variable to 'dev'.
 * The usual place to set this environment variable is in the .htaccess or vhost config.
 */
$environment = getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'prod';

$app = new Application();

/**
 * Enable debugging for dev environments
 */
if ('dev' === $environment) {
    $app['debug'] = true;
}

/**
 * Register Controllers as a Service.
 */
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

/**
 * Register Doctrine DBAL.
 *
 * @link http://silex.sensiolabs.org/doc/providers/doctrine.html
 */
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'silex',
        'host' => 'localhost',
        'user' => 'root',
        'password' => 'password',
    ),
));

/**
 * Register Twig.
 *
 * @link http://silex.sensiolabs.org/doc/providers/twig.html
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/Views',
));
/**
 * Register Monolog and set log file location.
 *
 * @link http://silex.sensiolabs.org/doc/providers/monolog.html
 */
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/logs/development.log',
));
