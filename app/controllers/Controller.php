<?php

namespace App\Controllers;


class Controller
{
    public function html_view_ajax($view, $data = array())
    {
        if (is_array($data)) {
            extract($data);
        }
        ob_start();
        include "./app/views/" . $view . ".php";

        $content = ob_get_contents();

        ob_clean();
        return $content;
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
