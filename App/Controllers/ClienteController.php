<?php

namespace App\Controllers;
use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;

class ClienteController extends Controller
{
    public function index()
    {
        $ClienteDAO = new ClienteDAO();

        self::setViewParam('listaCliente', $ClienteDAO->listar());

        $this->render('cliente/index');

    }

    public function cadastro()
    {
        $this->render('cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
}