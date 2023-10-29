<?php 

namespace Models\Entidades;


class Ingredientes 
{
    private int $idIngredientes; 
    private string $nome; 
    private float $preco; 
    

    public function getIdIngredientes()
    {
        return $this->idIngredientes;
    } 
    public function setIdIngredientes($idIngredientes)
    {
        $this->idIngredientes = $idIngredientes;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}