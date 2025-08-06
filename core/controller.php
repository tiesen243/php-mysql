<?php

class Controller
{
    public function model($model)
    {
        $filePath = dirname(__DIR__) . '/app/models/' . $model . '.model.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return new $model();
        } else {
            throw new Exception("Model file not found: " . $filePath);
        }
    }

    public function view($view, $data = [])
    {
        $filePath = dirname(__DIR__) . '/app/views/' . $view . '/page.php';
        if (!file_exists($filePath)) {
            die("View file not found: " . $filePath);
        }

        ob_start();
        require $filePath;
        $content = ob_get_clean();

        extract($data);
        require dirname(__DIR__) . '/app/views/_layout.php';
    }
}
