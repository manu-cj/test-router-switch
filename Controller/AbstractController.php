<?php

namespace App\Controller;

abstract class AbstractController
{
    abstract public function index();

    /**
     * @param string $template
     * @param array $data
     * @return void
     */
    public function render(string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . '/../View/' . $template . '.html.php';
        $html = ob_get_clean();
        require __DIR__ . '/../View/base.html.php';
    }

    public function getpost(): bool {
        return isset($_POST['save']);
    }

    public function getForm(string $param, $default = null) {
        if (!isset($_POST[$param])) {
            return(null === $default) ? '' :$default;
        }
        return $_POST[$param];
    }
}

