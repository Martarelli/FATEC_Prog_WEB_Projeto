<?php 


namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\PedidoDAO;
use App\Models\Entidades\Pedido;

use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;

class PedidoController extends Controller
{
    
    public function index()
    {       
        if (!$this->auth()) $this->redirect('/login/index');
 
        $pedidoDAO = new PedidoDAO();

        self::setViewParam('listaPedidos', $pedidoDAO->listar());
      
        $this->render('/pedido/index');

        Sessao::limpaErro();
        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $clienteDAO = new ClienteDAO();

        self::setViewParam('listaClientes', $clienteDAO->listar());
        

        $this->render('/pedido/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    
    }

    public function salvar()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/Pedido'); }

        $cliente = new Cliente();
        $cliente->setIdCliente($_POST['idCliente']);
        
        $pedido = new Pedido();
        $pedido->setCliente($cliente);

        Sessao::gravaFormulario($_POST);
        
        try { 

            $pedidoDAO = new PedidoDAO(); 
            $lastId = $pedidoDAO->salvar($pedido);
            $pedido->setIdPedido($lastId);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pedido');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pedido adicionado com sucesso!");
        
        $this->redirect('/pedido');
    }

    public function edicao($params)
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $id = $params[0];

        $pedidoDAO = new PedidoDAO();

        $pedido = $pedidoDAO->getById($id);

        if(!$pedido){
            Sessao::gravaMensagem("Pedido (id:{$id}) inexistente.");
            $this->redirect('/pedido');
        }

        $clienteDAO = new ClienteDAO();

        self::setViewParam('listaClientes', $clienteDAO->listar());
        self::setViewParam('pedido',$pedido);
    
        $this->render('/pedido/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $pedido = new Pedido();

        $pedido->setIdPedido($_POST['id']);
        $pedido->getCliente()->getIdCliente();
       
        Sessao::gravaFormulario($_POST);


        try {

            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->atualizar($pedido);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pedido');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pedido atualizado com sucesso!");

        $this->redirect('/pedido');
    }
    
    public function exclusao($params)
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $id = $params[0];

        $pedidoDAO = new PedidoDAO();

        $pedido = $pedidoDAO->getById($id);

        if(!$pedido){
            Sessao::gravaMensagem("Pedido (id:{$id}) inexistente.");
            $this->redirect('/pedido');
        }

        self::setViewParam('pedido',$pedido);

        $this->render('/pedido/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function excluir()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/cliente'); }

        $pedido = new Pedido();
        $pedido->setIdPedido($_POST['id']);

        $pedidoDAO = new PedidoDAO();

        try {
            
            if (!$pedidoDAO->excluir($pedido->getIdPedido())){
                Sessao::gravaMensagem("Pedido (id:{$pedido->getIdPedido()}) inexistente.");
                $this->redirect('/pedido');
            }

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pedido');            
        }       
       
        Sessao::gravaMensagem("O pedido '{$pedido->getIdPedido()}' excluido com sucesso");
        $this->redirect('/pedido');
    }
}


