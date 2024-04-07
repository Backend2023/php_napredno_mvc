<?php

namespace Framework;

use Exception;
use mysqli;
use mysqli_sql_exception;

class Database
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function get()
    {
        if (!isset(self::$instance)) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            try {
                self::$instance = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
            } catch (mysqli_sql_exception $e) {
                $error = $e->getMessage();
                echo $error;
            }
        }
        return  self::$instance;
    }

    public static function disconnect()
    {
        if (isset(self::$instance)) {
            self::$instance->close();
        }
        self::$instance = null;
    }
}
