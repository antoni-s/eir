<?php

namespace App\Models\Entidades;

use DateTime;

class Medicameto
{
    private $id;
    private $nome;
    private $codigoBarras;
    private $composicao;
    private $tipo;
    private $dose;
    private $informacoes;
    private $dataAtualizacao;

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

    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
    }

    public function getComposicao()
    {
        return $this->composicao;
    }

    public function setComposicao($composicao)
    {
        $this->composicao = $composicao;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getDose()
    {
        return $this->dose;
    }

    public function setDose($dose)
    {
        $this->dose = $dose;
    }

    public function getDataAtualizacao()
    {
        return new DateTime($this->dataAtualizacao);
    }

    public function setDataAtualizacao($dataAtualizacao)
    {
        $this->dataAtualizacao = $dataAtualizacao;
    }
}
