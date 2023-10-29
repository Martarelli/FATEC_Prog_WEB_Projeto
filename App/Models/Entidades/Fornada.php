<?php 

namespace Models\Entidades;


class Fornada
{
    private int $idFornada; 
    private int $numeroFornada; 
    private int $qtd_pizzas; 

    public function getIdFornada()
    {
        return $this->idFornada;
    }


    public function setIdFornada($idFornada)
    {
        $this->idFornada = $idFornada;
    }

    public function getNumeroFornada()
    {
        return $this->numeroFornada;
    }

    public function setNumeroFornada($numeroFornada)
    {
        $this->numeroFornada = $numeroFornada;
    }

    public function getQtd_pizzas()
    {
        return $this->qtd_pizzas;
    }

    public function setQtd_pizzas($qtd_pizzas)
    {
        $this->qtd_pizzas = $qtd_pizzas;

    }
}