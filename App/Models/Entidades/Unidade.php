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
    private $logradouro;
    private $bairro;
    private $cep;
    private $cidade;
    private $uf;
    private $complemento;
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

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
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
