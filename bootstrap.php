<?php

// Everything that needs to be bootstrapped goes in here
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
var_dump(php_sapi_name());
use League\Container\Container;
use Framework\Router\{
    Request,
    Router,
    Route
};
use App\Infrastructure\Database\{
    Connector,
    Persistence
};


// Add Container and dependencies inside it //
$container = new Container();
$container->add(Request::class);
$container->add(Router::class)->addArgument(Request::class);
$container->add(Connector::class)->addArgument('1172.0.0.1:8802')
                                 ->addArgument('root')
                                 ->addArgument('root')
                                 ->addArgument('ddd_in_php');
$container->add(Persistence::class)->addArgument(Connector::class);


// Get Router from container and init it //
$request = $container->get(Request::class);
$router  = $container->get(Router::class);


// Set up the routes //
$route = new Route('ceva/ceva/:car', function($car) {
    var_dump('I drive a ' . $car);
});

$route_post = Route::post('ceva/ceva/:car', function($car) {
    var_dump('I drive two ' . $car);
});

$router->add($route);
$router->add($route_post);
$router->add(Route::get('ceva/mihai/:car', function($car) {
    var_dump('I am Mihai');
}));

// Invoke the router and catch the exception if it throws one //
try {
    $router->run();
} catch(Exception $e) {
    return var_dump(404);
}
