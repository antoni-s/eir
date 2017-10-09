<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Unidade;

class UnidadeValidador{

    public function validar(Unidade $unidade)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($unidade->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        // if(empty($unidade->getPreco()))
        // {
        //     $resultadoValidacao->addErro('preco',"Preço: Este campo não pode ser vazio");
        // }
        //
        // if(empty($unidade->getUnidade()))
        // {
        //     $resultadoValidacao->addErro('unidade',"Unidade: Este campo não pode ser vazio");
        // }

        if(empty($unidade->getIdu()))
        {
            $resultadoValidacao->addErro('idu',"IDU: Este campo não pode ser vazio");
        }

        if(empty($unidade->getLogradouro()))
        {
            $resultadoValidacao->addErro('logradouro',"Logradouro: Este campo não pode ser vazio");
        }

        if(empty($unidade->getBairro()))
        {
            $resultadoValidacao->addErro('bairro',"Bairro: Este campo não pode ser vazio");
        }

        if(empty($unidade->getCep()))
        {
            $resultadoValidacao->addErro('cep',"CEP: Este campo não pode ser vazio");
        }

        if(empty($unidade->getCidade()))
        {
            $resultadoValidacao->addErro('cidade',"Cidade: Este campo não pode ser vazio");
        }

        if(empty($unidade->getUf()))
        {
            $resultadoValidacao->addErro('uf',"UF: Este campo não pode ser vazio");
        }

        if(empty($unidade->getComplemento()))
        {
            $resultadoValidacao->addErro('complemento',"Complemento: Este campo não pode ser vazio");
        }

        // if(empty($unidade->getDescricao()))
        // {
        //     $resultadoValidacao->addErro('descricao',"Descrição: Este campo não pode ser vazio");
        // }

        return $resultadoValidacao;
    }
}
