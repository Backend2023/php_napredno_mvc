<?php

namespace Framework;


class Router
{
    static $currentPath = "";
    static $routes = [];
    static function init()
    {
        self::$currentPath = strtok($_SERVER['REQUEST_URI'], '?');
        self::$currentPath = rtrim(self::$currentPath, '/');
        self::handle();
    }

    /**
     * Ova funckija prolazi kroz sve registrirane routove i provjerava da li 
     * postoji jedna koja odgovara trenutnim url-om. Ako ruta postoji, funkcija pozove
     * registrirani callback za tu rutu s parametrima.
     *
     * @return void
     */
    static function handle()
    {
        foreach (self::$routes as $route) {

            // Pretvara url s parametrima poput '/users/:uid/posts/:pid' u regex '/users/([a-zA-Z0-9\-\_]+)/posts/([a-zA-Z0-9\-\_]+)'
            // Ovo radimo kako bismo "ulovili" dinamičke parametre s regexom.
            $pattern = "@^" . preg_replace('/\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\_\-]+)', $route->getPath()) . "$@D";

            // prazan array matches u kojemu cemo spremati vrijednosti parametara koji smo "ulovili" sa preg_match
            $matches = [];
            // provjera ako postoji registrirani route koji odgovara requestu
            if (preg_match($pattern, self::$currentPath, $matches) && $route->getMethod() === $_SERVER['REQUEST_METHOD']) {
                // maknemo prvi match jer se u njemu nalazi cijeli tekst koji je pretrazen, nama treba samo matches
                array_shift($matches);
                // zovemo registrirani callback koji smo postavili prilikom registriranja routa
                $route->call(...$matches);
                return;
            }
        }
        self::redirect("/404");
    }

    /**
     * S ovom funkcijom registriramo GET rote
     *
     * @param string $path
     * @param $callback
     * @return void
     */
    static function get(string $path, $callback)
    {
        self::$routes[] = new Route(rtrim($path, '/'), $callback, 'GET');
    }

    /**
     * S ovom funkcijom registriramo POST rote
     *
     * @param string $path
     * @param $callback
     * @return void
     */
    static function post(string $path, $callback)
    {
        self::$routes[] = new Route(rtrim($path, '/'), $callback, 'POST');
    }


    /**
     * Pomoćna funkcija za napraviti redirect.
     *
     * @param string $location
     * @param string $message
     * @return void
     */
    static function redirect(string $location, $message = "")
    {
        if ($message === "") {
            header('Location:' . $location);
        } else {
            header('Location:' . $location . '?message=' . $message);
        }
    }
}
