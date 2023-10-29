<?php 

namespace Models\Entidades;


class Pizza 
{
    private int $idPizza; 
    private string $nome;
    private float $preco; 
    private bool $personalizada; 

   public function __construct()
   {
        $this->personalizada = false; 
   } 

    public function getIdPizza()
    {
        return $this->idPizza;
    }

    public function setIdPizza($idPizza)
    {
        $this->idPizza = $idPizza;

        return $this;
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

        return $this;
    }

    public function getPersonalizada()
    {
        return $this->personalizada;
    }

    public function setPersonalizada($personalizada)
    {
        $this->personalizada = $personalizada;
    }
}