<?php 

namespace App\Models\Entidades;


class Pedido 
{
    private int $idPedido; 
    private Cliente $idCliente;

    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente(Cliente $idCliente)
    {
        $this->idCliente = $idCliente;
    }
}