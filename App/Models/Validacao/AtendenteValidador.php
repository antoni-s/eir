<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Atendente;

class AtendenteValidador{

    public function validar(Atendente $atendente)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($atendente->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        // if(empty($atendente->getPreco()))
        // {
        //     $resultadoValidacao->addErro('preco',"Preço: Este campo não pode ser vazio");
        // }
        //
        // if(empty($atendente->getUnidade()))
        // {
        //     $resultadoValidacao->addErro('unidade',"Unidade: Este campo não pode ser vazio");
        // }

        if(empty($atendente->getCpf()))
        {
            $resultadoValidacao->addErro('cpf',"CPF: Este campo não pode ser vazio");
        }

        if(empty($atendente->getMatricula()))
        {
            $resultadoValidacao->addErro('matricula',"Matricula: Este campo não pode ser vazio");
        }

        if(empty($atendente->getLogradouro()))
        {
            $resultadoValidacao->addErro('logradouro',"Logradouro: Este campo não pode ser vazio");
        }

        if(empty($atendente->getBairro()))
        {
            $resultadoValidacao->addErro('bairro',"Bairro: Este campo não pode ser vazio");
        }

        if(empty($atendente->getCep()))
        {
            $resultadoValidacao->addErro('cep',"CEP: Este campo não pode ser vazio");
        }

        if(empty($atendente->getCidade()))
        {
            $resultadoValidacao->addErro('cidade',"Cidade: Este campo não pode ser vazio");
        }

        if(empty($atendente->getUf()))
        {
            $resultadoValidacao->addErro('uf',"UF: Este campo não pode ser vazio");
        }

        if(empty($atendente->getComplemento()))
        {
            $resultadoValidacao->addErro('complemento',"Complemento: Este campo não pode ser vazio");
        }

        if(empty($atendente->getTelefone()))
        {
            $resultadoValidacao->addErro('telefone',"Telefone: Este campo não pode ser vazio");
        }

        if(empty($atendente->getEmail()))
        {
            $resultadoValidacao->addErro('email',"Email: Este campo não pode ser vazio");
        }

        // if(empty($atendente->getDescricao()))
        // {
        //     $resultadoValidacao->addErro('descricao',"Descrição: Este campo não pode ser vazio");
        // }

        return $resultadoValidacao;
    }
}
