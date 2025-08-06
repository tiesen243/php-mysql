<?php

class HomeController extends Controller {
  public function index() {
    $this->view('home', [
      'title' => 'Home',
      'description' => 'This is a basic PHP MVC structure.'
    ]);
  }
}

?>

