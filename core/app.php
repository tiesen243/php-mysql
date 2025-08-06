<?php

class App
{
    public function __construct()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING) ?? '';
        echo "$url";
    }

    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['home'];
    }
}
