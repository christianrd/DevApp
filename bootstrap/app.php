<?php
/**
 * Created by PhpStorm.
 * User: ChristianDevCode
 * Date: 7/31/2016
 * Time: 5:26 AM
 */

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App([
    'settings'  =>  [
        'displayErrorDetails'   =>  true,
    ]
]);


$container = $app->getContainer();

$container['view'] = function ($container){
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache'   =>  false,
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['WelcomeController'] = function ($container){
    return new \App\Controllers\WelcomeController($container);
};

require __DIR__ . '/../app/routes.php';