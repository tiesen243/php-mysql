<?php

class NotFoundController extends Controller
{
    public function index()
    {
        $this->view('not-found', [
            'title' => 'Page Not Found',
            'message' => 'The page you are looking for does not exist.'
        ]);
    }
}
