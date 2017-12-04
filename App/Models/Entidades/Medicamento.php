<?php

namespace App\Models\Entidades;

use DateTime;

class Medicamento
{
    private $id;
    private $nome;
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

		public function getCodigo()
		{
				return $this->codigo;
		}

		public function setCodigo($codigo)
		{
				$this->codigo = $codigo;
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

		public function getInformacoes()
		{
				return $this->informacoes;
		}

		public function setInformacoes($informacoes)
		{
				$this->informacoes = $informacoes;
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
