<?php

namespace Framework;


class Route
{

    public function __construct(private string $path, private $callback, private $method = 'GET')
    {
    }

    /**
     * S ovom funkcijom pozovemo callback route.
     * Ako je callback funkcija, pozovemo funkciju.
     * Ako je callback array, dolazi iz controllera pa moramo spojit ime classe i funkcije kako bismo mogli pozvat statičku funkciju.
     *
     * @param ...$args
     * @return void
     */
    public function call(...$args)
    {
        if (is_callable($this->callback)) {
            $func = $this->callback;
        } else if (is_array($this->callback)) {
            $func = $this->callback[0] . '::' . $this->callback[1];
        }

        $func(...$args);
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getMethod()
    {
        return $this->method;
    }
}
