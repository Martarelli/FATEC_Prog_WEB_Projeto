<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        if (!$this->auth()) $this->redirect('/login/index');
        
        $this->render('home/index');
    }
}