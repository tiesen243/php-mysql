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
      throw new Exception('Model file not found: ' . $filePath);
    }
  }

  public function render($view, $data = [])
  {
    $filePath = dirname(__DIR__) . '/app/views/' . $view . '/page.php';
    if (!file_exists($filePath)) {
      $filePath = dirname(__DIR__) . '/app/views/not-found/page.php';
    }

    extract($data);

    ob_start();
    require $filePath;
    $content = ob_get_clean();

    require dirname(__DIR__) . '/app/views/_layout.php';
  }
}
