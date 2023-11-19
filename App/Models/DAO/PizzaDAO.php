<?php

namespace App\Models\DAO;

use App\Models\Entidades\Pizza;
use Exception;


class PizzaDAO extends BaseDAO
{
    public function listar()
    {
        $resultado = $this->select("SELECT * FROM pizza");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Pizza::class);
    }

    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM pizza WHERE idPizza = $id");

        return $resultado->fetchObject(Pizza::class);
    }

    public function salvar(Pizza $pizza)
    {
        try {

            $nome           = $pizza->getNome();
            $preco          = $pizza->getPreco();
            $tamanho        = $pizza->getTamanho();

            return $this->insert(
                'pizza',
                ":nome,:preco,:tamanho",
                [
                    ':nome'         =>$nome,
                    ':preco'     =>$preco,
                    ':tamanho'     =>$tamanho,
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    // public  function atualizar(Pizza $pizza)
    // {
    //     try {

    //         $id             = $cliente->getIdCliente();
    //         $nome           = $cliente->getNome();
    //         $telefone          = $cliente->getTelefone();
    //         $endereco     = $cliente->getEndereco();

    //         return $this->update(
    //             'cliente',
    //             "nome = :nome, telefone = :telefone, endereco = :endereco",
    //             [
    //                 ':id'           =>$id,
    //                 ':nome'         =>$nome,
    //                 ':telefone'        =>$telefone,
    //                 ':endereco'   =>$endereco,
    //             ],
    //             "idCliente = :id"
    //         );

    //     }catch (\Exception $e){
    //         throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
    //     }
    // }

    // public function excluir (int $id)
    // {
    //     try {

    //         return $this->delete('cliente', "idCliente = $id");

    //     }catch (\Exception $e) {
    //         throw new \Exception("Erro ao excluir o cliente. " . $e->getMessage(), 500);
    //     }
    // }
    
}



?>
