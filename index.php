<?php declare(strict_types=1);

include 'vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

// API
//$responseFactory = new Laminas\Diactoros\ResponseFactory();
//$strategy = new League\Route\Strategy\JsonStrategy($responseFactory);
//$router   = (new League\Route\Router)->setStrategy($strategy);

// HTML
$router = new League\Route\Router;

// map a route
$router->map('GET', '/', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write('<h1>Hello, World 123!</h1>');
    return $response;
});

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);