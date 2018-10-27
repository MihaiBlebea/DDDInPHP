<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



use App\Domain\Show\{
    Show,
    Title
};
use App\Domain\Price\{
    Price,
    Currency
};
use App\Domain\User\{
    User,
    Age,
    Password,
    Email,
    Username,
    UserFactory
};
use App\Infrastructure\{
    Connection,
    UserRepo
};
use App\Application\{
    RegisterService,
    LoginService,
    LogoutService
};


$user = UserFactory::build(
    null,
    'Mihai Blebea',
    'mihaiserban.blebea@gmail.com',
    28,
    'intrex007',
    'mihai.blebea'
);

$register_service = new RegisterService(new UserRepo());
$register_service->execute($user);

$login_service = new LoginService(new UserRepo());
$is_login = $login_service->execute(new Email('mihaiserban.blebea@gmail.com'), 'intrex007');
var_dump($is_login);
var_dump($_SESSION['auth']);

LogoutService::execute();
var_dump($_SESSION['auth']);
