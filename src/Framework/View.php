<?php

namespace Framework;

class View
{
    /**
     * Funkcija za renderiranje View-a
     *
     * @param string $viewName Ime viewa u Views folderu
     * @param array $vars Asocijativni array varijabla koje cemo koristiti u viewu
     * @param string $template Ime templata kojeg zelimo koristiti za view, default je template
     * @return void
     */
    static function render(string $viewName, array $vars = [], $template = 'template')
    {
        if (isset($vars)) {
            extract($vars);
        }

        // S ob_start i ob_get_clean mozemo spremiti ono sto se nalazi u include u varijablu umijesto da to šaljemo direktno klijentu.
        ob_start();
        include VIEWS . '/' . $viewName . '.php';
        $content = ob_get_clean();

        require VIEWS . '/' . $template . '.php';
    }
}
