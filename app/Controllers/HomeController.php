<?php
/**
 * File HomeController.php
 *
 * @author Jon Kamke <jon@kamke.org>
 */
namespace MyApp\Controllers;

use MyApp\Repository\HomeRepository;

/**
 * MyController
 *
 * @author Jon Kamke <jon@kamke.org>
 */
class HomeController
{
    /**
     * @var Application Silex Application
     */
    private $app;
    /**
     * @var Twig Service Provider
     */
    private $twig;
    /**
     * @var HomeRepository Database repository
     */
    private $repo;

    /**
     * @param $app
     * @param HomeRepository    $repo
     */
    public function __construct($app, HomeRepository $repo)
    {
        $this->app = $app;
        $this->twig = $app['twig'];
        $this->repo = $repo;
    }

    /**
     * Home page index action.
     *
     * @return mixed Twig
     */
    public function indexAction()
    {
        //$this->app['monolog']->addInfo('Home controller');

        $body = $this->repo->bodyText();
        $body = $body['body'];

        return $this->twig->render('home.twig', array(
            'body' => $body,
        ));
    }
}
