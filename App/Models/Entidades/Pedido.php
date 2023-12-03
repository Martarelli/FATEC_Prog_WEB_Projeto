<?php 

namespace App\Models\Entidades;
use DateTime;


class Pedido 
{
    private int $idPedido; 
    private Cliente $cliente;
    private $dt_pedido;


    public function __construct()
    {
        $this->cliente = new Cliente();
     
    }
    
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function setIdPedido(int $idPedido)
    {
        $this->idPedido = $idPedido;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

     public function getDataPedido()
    {
        return new DateTime($this->dt_pedido);
    }

    public function setDataPedido($data)
    {
        $this->dt_pedido = $data;
    }

}

?>