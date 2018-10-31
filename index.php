<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';



use App\Infrastructure\Database\{
    Connector,
    Persistence
};
use App\Infrastructure\ShowRepo;
use App\Domain\Show\{
    ShowId,
    Title
};

// $host     = '0.0.0.0:8802';
// $username = 'root';
// $password = 'root';
// $dbname   = 'ddd_in_php';
//
// $conn = new Connector($host, $dbname, $username, $password);
// $persist = new Persistence($conn);
$persist  = $container->get(Persistence::class);

$show_repo = new ShowRepo($persist);
// $shows = $show_repo->withTitle(new Title('Little Prince'));
