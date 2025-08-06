<?php

class App {
  protected $controller = 'home.controller';
  protected $controllerClass = 'HomeController';

  protected $method = 'index';
  protected $params = [];

  public function __construct() {
    $url = $this->parseUrl();

    if (file_exists('../app/controllers/' . $url[0] . '.controller.php')) {
      $this->controller = $url[0] . '.controller';
      $this->controllerClass = ucfirst($url[0]) . 'Controller';
      unset($url[0]);
    }

    require_once '../app/controllers/' . $this->controller . '.php';
    $this->controllerClass = new $this->controllerClass;

    if (isset($url[1]) && method_exists($this->controllerClass, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
    }

    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->controllerClass, $this->method], $this->params);
  }

  private function parseUrl() {
    if (isset($_GET['url'])) 
      return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    return ['home'];
  }
}
