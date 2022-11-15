<?php

namespace App\Controllers;


class Controller
{
    public function view($view, $data = array())
    {
        if (is_array($data)) {
            extract($data);
        }
        ob_start();
        include "./app/views/" . $view . ".php";
        return ob_get_contents();
    }

    public function render($view, $data = array(), $layout = '_layout')
    {
        if (is_array($data)) {
            extract($data);
        }

        $view = "./app/views/" . $view . '.php';
        include './app/views/_layouts/' . $layout . '.php';
    }

    function redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
}
