<?php

namespace Models\Entidades;


class Cliente
{
    private int $idCliente;
    private string $nome;
    private string $telefone;
    private string $endereco;
    private string $login;
    private string $senha;

    public function getIdCliente(): int
    {
        return $this->idCliente;
    }
    public function setIdCliente($id): void
    {
        $this->idCliente = $id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }
    public function getEndereco(): string
    {
        return $this->endereco;
    }
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }
    public function getLogin(): string
    {
        return $this->login;
    }
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
}
