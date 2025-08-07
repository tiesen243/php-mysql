<?php

class AboutController extends Controller
{
  public function index()
  {
    $this->render('about', [
      'title' => 'About Us',
      'description' =>
        'Learn more about our PHP MVC application, its features, and the team behind it.',
    ]);
  }
}
