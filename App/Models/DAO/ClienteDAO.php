<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cliente;
use Exception;


class ClienteDAO extends BaseDAO
{
    public function listar()
    {
        $resultado = $this->select("SELECT * FROM cliente");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Cliente::class);
    }

    public function salvar(Cliente $cliente)
    {
        try {

            $nome           = $cliente->getNome();
            $telefone       = $cliente->getTelefone();
            $endereco       = $cliente->getEndereco();

            return $this->insert(
                'cliente',
                ":nome,:telefone,:endereco",
                [
                    ':nome'         =>$nome,
                    ':telefone'     =>$telefone,
                    ':endereco'     =>$endereco,
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }
    
}



?>
