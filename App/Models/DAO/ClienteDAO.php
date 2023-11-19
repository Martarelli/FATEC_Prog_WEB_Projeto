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

    
}



?>
