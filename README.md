# SMLib

## Getting start

## Application Structure

```
index.php
models
    - BaseModel
    - UserModel
controllers
    - BaseController
    - AuthController
    - CategoryController
    - LabelController
    - DocumentController
routes.php
middlewares    
views
helpers
libraries
configs
vendor
composer.json
.env
```

### Router

- https://route.thephpleague.com/5.x/routes/

```bash
composer require league/route
composer require laminas/laminas-diactoros
composer require laminas/laminas-httphandlerrunner
```

```php
<?php declare(strict_types=1);

include 'path/to/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

$router = new League\Route\Router;

// map a route
$router->map('GET', '/', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Laminas\Diactoros\Response;
    $response->getBody()->write('<h1>Hello, World!</h1>');
    return $response;
});

$response = $router->dispatch($request);

// send the response to the browser
(new Laminas\HttpHandlerRunner\Emitter\SapiEmitter)->emit($response);
```

## References