<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


ErrorHandler::register();
ExceptionHandler::register();

$app->register(new Silex\Provider\DoctrineServiceProvider());

$app['dao.cooltainer'] = function ($app) {
    return new Agriwatch\DAO\CooltainerDAO($app['db']);
};

$app->before(function (Request $request, Silex\Application $app) {

    if($request->query->get('token') !== $app['token']){
        $error = array('message' => 'Access is denied due to invalid token.');
        return $app->json($error, 401);
    }

});

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
});