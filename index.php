<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



use App\Domain\Show\{
    Show,
    Title,
    ShowId
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
    UserRepo,
    ShowRepo,
    ShowDAO
};
use App\Application\{
    RegisterService,
    LoginService,
    LogoutService,
    UserRegisterRequest
};


$user_register_request = new UserRegisterRequest(
    'Mihai Blebea',
    'mihaiserban.blebea@gmail.com',
    28,
    'intrex007',
    'mihai.blebea'
);

$register_service = new RegisterService(new UserRepo());
$register_service->execute($user_register_request);

// $login_service = new LoginService(new UserRepo());
// $is_login = $login_service->execute(new Email('mihaiserban.blebea@gmail.com'), 'intrex007');
// var_dump($is_login);
// var_dump($_SESSION['auth']);
//
// LogoutService::execute();
// var_dump($_SESSION['auth']);

// $pound = new Currency('£', 'GBP');
// $little_prince = new Show(new ShowId(), new Title('Little Prince'), new Age(24), new Price(28, $pound));
// $shows = new ShowRepo();
// $shows->add($little_prince);
// $shows->withTitle(new Title('Little Prince'));
//
// var_dump($shows);
