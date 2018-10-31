<?php

// Everything that needs to be bootstrapped goes in here
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Framework\Router\{
    Request,
    Router,
    Route
};

function dd($args)
{
    echo '<pre>'; echo json_encode($args, JSON_PRETTY_PRINT); echo '</pre>';
    die();
}

$request = new Request();


$router = new Router($request);
// var_dump($router);

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

try {
    $router->run();
} catch(Exception $e) {
    return var_dump(404);
}
