<?php

namespace App\Application;


class LogoutService
{
    public static function execute()
    {
        $_SESSION['auth'] = null;
    }
}
