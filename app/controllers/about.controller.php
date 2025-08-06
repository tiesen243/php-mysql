<?php

class AboutController extends Controller
{
    public function index()
    {
        $this->view('about', [
            'title' => 'About Us',
            'description' => 'Learn more about our PHP MVC application, its features, and the team behind it.'
        ]);
    }
}
