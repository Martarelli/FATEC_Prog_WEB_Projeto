<?php 

namespace Models\Entidades;


class Pedido 
{
    private int $idPedido; 
    private Cliente $idCliente;
    private Fornada $idFornada;   

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

    public function getIdFornada()
    {
        return $this->idFornada;
    }

 
    public function setIdFornada(Fornada $idFornada)
    {
        $this->idFornada = $idFornada;
    }
}