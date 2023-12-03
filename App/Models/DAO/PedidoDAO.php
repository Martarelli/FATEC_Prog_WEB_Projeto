<?php


namespace App\Models\DAO;

use App\Models\Entidades\Pedido;
use Exception;

class PedidoDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT p.id as idPedido,
                    c.id as idCliente,
                FROM pedido  as p INNER JOIN cliente as c on p.idCliente = c.id
                WHERE p.id = $id
            "
        );

        $dataSetPedidos = $resultado->fetch();

        if($dataSetPedidos) {
            $pedido = new Pedido();
            $pedido->setIdPedido($dataSetPedidos['idPedido']);
            $pedido->getCliente()->setIdCliente($dataSetPedidos['idCliente']);
            $pedido->getCliente()->setNome($dataSetPedidos['nomeCliente']);

            return $pedido;
        }

        return false;
    }

    public function listar()
    {
        $resultado = $this->select("SELECT * FROM pedido");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Pedido::class);
    }

    public function salvar(Pedido $pedido)
    {
        try {

            $idCliente = $pedido->getCliente()->getIdCliente();
          
            return $this->insert(
                'pedido',
                ":idCliente",
                [
                    ':idCliente' => $idCliente,
                ]
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Pedido $pedido)
    {
        try {

            $id = $pedido->getIdPedido();
            $idCliente = $pedido->getCliente()->getIdCliente();
            
            return $this->update(
                'pedido',
                "idCliente = :idCliente",
                [
                    ':id' => $id,
                    ':idCliente' => $idCliente
                ],
                "idPedido = :id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function excluir(int $id)
    {
        try {
            return $this->delete('pedido', "id = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao deletar" . $e->getMessage(), 500);
        }
    }
}
