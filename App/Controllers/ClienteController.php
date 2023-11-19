<?php

namespace App\Controllers;
use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $ClienteDAO = new ClienteDAO();

        self::setViewParam('listaCliente', $ClienteDAO->listar());

        $this->render('cliente/index');
        Sessao::limpaMensagem();

    }

    public function cadastro()
    {
        $this->render('cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        if (!$_POST) { $this->redirect('/cliente'); }

        $cliente = new Cliente();
        $cliente->setNome($_POST['nome']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        Sessao::gravaFormulario($_POST);

        try { 

            $clienteDAO = new ClienteDAO();
            $clienteDAO->salvar($cliente);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/cliente');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Cliente adicionado com sucesso!");

        $this->redirect('/cliente');
    }

    public function edicao($params)
    {
        if(!$params){ $this->redirect('/cliente'); } 
        
        $id = $params[0];

        $clienteDAO = new ClienteDAO();

        $cliente = $clienteDAO->getById($id);

        if(!$cliente){
            Sessao::gravaErro("Cliente (id:{$id}) inexistente.");
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente',$cliente);

        $this->render('/cliente/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        if (!$_POST) { $this->redirect('/cliente'); }
        
        $cliente = new Cliente();
        $cliente->setIdCliente($_POST['idCliente']);
        $cliente->setNome($_POST['nome']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        Sessao::gravaFormulario($_POST);

        try {

            $clienteDAO = new ClienteDAO();
            $clienteDAO->atualizar($cliente);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/cliente');            
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Cliente atualizado com sucesso!");

        $this->redirect('/cliente');
    }
}