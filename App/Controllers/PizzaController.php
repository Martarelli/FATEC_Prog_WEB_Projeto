<?php

namespace App\Controllers;
use App\Lib\Sessao;
use App\Models\DAO\PizzaDAO;
use App\Models\Entidades\Pizza;

class PizzaController extends Controller
{
    public function index()
    {
        $PizzaDAO = new PizzaDAO();

        self::setViewParam('listaPizza', $PizzaDAO->listar());

        $this->render('pizza/index');
        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('pizza/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        if (!$_POST) { $this->redirect('/pizza'); }

        $pizza = new Pizza();
        $pizza->setNome(strtolower($_POST['nome']));
        $pizza->setPreco($_POST['preco']);
        $pizza->setTamanho(strtolower($_POST['tamanho']));

        Sessao::gravaFormulario($_POST);

        try { 

            $pizzaDAO = new PizzaDAO();
            $pizzaDAO->salvar($pizza);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pizza');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pizza adicionada com sucesso!");

        $this->redirect('/pizza');
    }

    // public function edicao($params)
    // {
    //     if(!$params){ $this->redirect('/cliente'); } 
        
    //     $id = $params[0];

    //     $clienteDAO = new ClienteDAO();

    //     $cliente = $clienteDAO->getById($id);

    //     if(!$cliente){
    //         Sessao::gravaErro("Cliente (id:{$id}) inexistente.");
    //         $this->redirect('/cliente');
    //     }

    //     self::setViewParam('cliente',$cliente);

    //     $this->render('/cliente/editar');

    //     Sessao::limpaMensagem();
    //     Sessao::limpaErro();
    // }

    // public function atualizar()
    // {
    //     if (!$_POST) { $this->redirect('/cliente'); }
        
    //     $cliente = new Cliente();
    //     $cliente->setIdCliente($_POST['idCliente']);
    //     $cliente->setNome($_POST['nome']);
    //     $cliente->setTelefone($_POST['telefone']);
    //     $cliente->setEndereco($_POST['endereco']);

    //     Sessao::gravaFormulario($_POST);

    //     try {

    //         $clienteDAO = new ClienteDAO();
    //         $clienteDAO->atualizar($cliente);

    //     } catch (\Exception $e) {
    //         Sessao::gravaMensagem($e->getMessage());
    //         $this->redirect('/cliente');            
    //     }

    //     Sessao::limpaFormulario();
    //     Sessao::limpaMensagem();
    //     Sessao::limpaErro();

    //     Sessao::gravaMensagem("Cliente atualizado com sucesso!");

    //     $this->redirect('/cliente');
    // }

    // public function exclusao($params)
    // {
    //     if(!$params){ $this->redirect('/cliente'); } 

    //     $id = $params[0];

    //     $clienteDAO = new ClienteDAO();

    //     $cliente = $clienteDAO->getById($id);

    //     if(!$cliente){
    //         Sessao::gravaMensagem("Cliente (idCliente:{$id}) inexistente.");
    //         $this->redirect('/cliente');
    //     }

    //     self::setViewParam('cliente',$cliente);

    //     $this->render('/cliente/exclusao');

    //     Sessao::limpaMensagem();
    //     Sessao::limpaErro();
    // }

    // public function excluir()
    // {
    //     if (!$_POST) { $this->redirect('/cliente'); }

    //     $cliente = new Cliente();
    //     $cliente->setIdCliente($_POST['idCliente']);
    //     $cliente->setNome($_POST['nome']);

    //     $clienteDAO = new ClienteDAO();

    //     try {

    //         if (!$clienteDAO->excluir($cliente->getIdCliente())){
    //             Sessao::gravaMensagem("Cliente (id:{$cliente->getIdCliente()}) inexistente.");
    //             $this->redirect('/cliente');
    //         }

    //     } catch (\Exception $e) {
    //         Sessao::gravaMensagem($e->getMessage());
    //         $this->redirect('/cliente');            
    //     }        

    //     Sessao::gravaMensagem("Cliente '{$cliente->getNome()}' excluido com sucesso!");

    //     $this->redirect('/cliente');
    // }
}