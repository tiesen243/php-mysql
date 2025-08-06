<?php

class Controller {
  public function model($model) {
    require_once "../app/models/$model.php";
    return new $model;
  }

  public function view($view, $data = []) {
    $viewFile = "../app/views/$view/page.php";

    if (!file_exists($viewFile))
      die("View file $viewFile does not exist.");

    extract($data);

    ob_start();
    require $viewFile;
    require "../app/views/_layout.php";
  }
}
