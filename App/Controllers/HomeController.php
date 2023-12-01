<?php

namespace App\Controllers;

use App\Models\DAO\PizzaDAO;
use App\Models\DAO\ClienteDAO;
use App\Models\DAO\UsuarioDAO;

class HomeController extends Controller
{
    public function index()
    {
        if (!$this->auth()) $this->redirect('/login/index');
        $ClienteDAO = new ClienteDAO();
        $PizzaDAO = new PizzaDAO();
        $UsuarioDAO = new UsuarioDAO();

        self::setViewParam('listaCliente', $ClienteDAO->listar());
        self::setViewParam('listaPizza', $PizzaDAO->listar());
        self::setViewParam('listaUsuarios', $UsuarioDAO->listar());

        $this->render('home/index');
    }
}