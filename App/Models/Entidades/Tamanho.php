<?php 

namespace Models\Entidades;


class Tamanho 
{
    private int $idTamanho; 
    private string $nome; 
    private float $desconto; 

    public function getIdTamanho()
    {
        return $this->idTamanho;
    }

    public function setIdTamanho($idTamanho)
    {
        $this->idTamanho = $idTamanho;

        return $this;
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

  
    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }
}