<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



use App\Infrastructure\Database\{
    Connector,
    Persistence
};
use App\Infrastructure\{
    ShowRepo,
    UserRepo
};
use App\Domain\Show\{
    ShowId,
    Title
};

use App\Domain\User\{
    UserId,
    Username,
    Email,
    Password,
    Age
};


$persist = $container->get(Persistence::class);

$show_repo = new ShowRepo($persist);
$shows = $show_repo->withTitle(new Title('Little Prince'));

$user_repo = new UserRepo($persist);
$user = UserFactory::build(
    $user_repo->nextIdentity(),
    'Mihai Blebea',
    'mihai.blebea',
    'mihaiserban.blebea@gmail.com',
    'intrex',
    28
);
var_dump($user);
