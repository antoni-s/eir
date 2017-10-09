<?php

namespace App\Models\Entidades;

use DateTime;

class Unidade
{
    private $id;
    private $nome;
    // private $preco;
    // private $unidade;
    // private $status;
    private $idu;
    // private $descricao;
    private $dataCadastro;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    // public function getPreco()
    // {
    //     return $this->preco;
    // }
    //
    // public function setPreco($preco)
    // {
    //     $this->preco = $preco;
    // }
    //
    // public function getUnidade()
    // {
    //     return $this->unidade;
    // }
    //
    // public function setUnidade($unidade)
    // {
    //     $this->unidade = $unidade;
    // }

    public function getIdu()
    {
        return $this->idu;
    }

    public function setIdu($idu)
    {
        $this->idu = $idu;
    }

    // public function getDescricao()
    // {
    //     return $this->descricao;
    // }
    //
    // public function setDescricao($descricao)
    // {
    //     $this->descricao = $descricao;
    // }

    public function getDataCadastro()
    {
        return new DateTime($this->dataCadastro);
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    // public function getStatus()
    // {
    //     return $this->status;
    // }
    // public function setStatus($status)
    // {
    //     $this->status = $status;
    // }
}
