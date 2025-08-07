<?php

class App
{
  private $controller;
  private $method;
  private $params = [];

  public function __construct()
  {
    $url = $this->parseUrl();

    $filePath =
      dirname(__DIR__) . '/app/controllers/' . $url[0] . '.controller.php';
    if (file_exists($filePath)) {
      require_once dirname(__DIR__) .
        '/app/controllers/' .
        $url[0] .
        '.controller.php';
      $this->controller = ucfirst($url[0]) . 'Controller';
      unset($url[0]);
    } else {
      require_once dirname(__DIR__) .
        '/app/controllers/not-found.controller.php';
      $this->controller = 'NotFoundController';
    }

    $this->controller = new $this->controller();

    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    } else {
      $this->method = 'index';
    }

    $this->params = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function parseUrl()
  {
    if (isset($_SERVER['PATH_INFO'])) {
      return explode('/', trim($_SERVER['PATH_INFO'], '/'));
    } else {
      return ['home'];
    }
  }
}
