<?php

namespace App\Models\DAO;

use Exception;
use Models\Entidades\Cliente;

class ClienteDAO extends BaseDAO
{
    public function listar()
    {
        $resultado = $this->select("SELECT * FROM cliente");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Cliente::class);
    }

    
}



?>
