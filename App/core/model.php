<?php

namespace App\Core;

class model
{
    private static $instance;

    public static function getConn()
    {
        if (!isset(self::$instance)) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=mvc;charst=utf8', 'root', '');
        }
        return self::$instance;
    }
}
