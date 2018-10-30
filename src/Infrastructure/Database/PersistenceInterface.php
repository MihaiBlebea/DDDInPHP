<?php

namespace App\Infrastructure\Database;


interface PersistenceInterface
{
    public function __construct(Connector $connector);
}
