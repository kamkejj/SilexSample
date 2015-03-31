<?php
/**
 * File index.php
 *
 * @author Jon Kamke <jon@kamke.org>
 */

require_once __DIR__.'/../vendor/autoload.php';

/**
 * Application settings.
 */
require_once __DIR__.'/../app/app.php';

use MyApp\Controllers\HomeController;
use MyApp\Repository\HomeRepository;

/**
 * Home Repository
 */
$app['home.repository'] = $app->share(function() use ($app) {
    return new HomeRepository($app);
});

/**
 * Define route and controller and action to use.
 */
$app->get('/', "home.controller:indexAction");
$app['home.controller'] = $app->share(function () use ($app) {
  return new HomeController($app, $app['home.repository']);
});


$app->run();
