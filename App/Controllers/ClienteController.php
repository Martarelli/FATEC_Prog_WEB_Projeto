<?php

namespace App\Controllers;

class ClienteController extends Controller
{
    public function index()
    {
        $this->render('cliente/index');
    }
}