<?php

namespace Framework;

use Dotenv\Dotenv;

class App
{

    public function __construct()
    {

        define('ROOT',     realpath(__DIR__ . '/../../'));
        define('VIEWS',    ROOT . '/src/App/Views');
        define('APP',    ROOT . '/src/App');

        $dotenv = Dotenv::createImmutable(ROOT);
        $dotenv->load();

        require_once APP . "/routes.php";


        Router::init();
    }
}
