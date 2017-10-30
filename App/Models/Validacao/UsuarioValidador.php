<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Usuario;

class UsuarioValidador{

    public function validar(Usuario $usuario)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($usuario->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        if(empty($usuario->getCpf()))
        {
            $resultadoValidacao->addErro('cpf',"CPF: Este campo não pode ser vazio");
        }

        if(empty($usuario->getSenha()))
        {
            $resultadoValidacao->addErro('senha',"Senha: Este campo não pode ser vazio");
        }

        if(empty($usuario->getLogradouro()))
        {
            $resultadoValidacao->addErro('logradouro',"Logradouro: Este campo não pode ser vazio");
        }

        if(empty($usuario->getBairro()))
        {
            $resultadoValidacao->addErro('bairro',"Bairro: Este campo não pode ser vazio");
        }

        if(empty($usuario->getCep()))
        {
            $resultadoValidacao->addErro('cep',"CEP: Este campo não pode ser vazio");
        }

        if(empty($usuario->getCidade()))
        {
            $resultadoValidacao->addErro('cidade',"Cidade: Este campo não pode ser vazio");
        }

        if(empty($usuario->getUf()))
        {
            $resultadoValidacao->addErro('uf',"UF: Este campo não pode ser vazio");
        }

        if(empty($usuario->getComplemento()))
        {
            $resultadoValidacao->addErro('complemento',"Complemento: Este campo não pode ser vazio");
        }

        if(empty($usuario->getTelefone()))
        {
            $resultadoValidacao->addErro('telefone',"Telefone: Este campo não pode ser vazio");
        }

        if(empty($usuario->getEmail()))
        {
            $resultadoValidacao->addErro('email',"Email: Este campo não pode ser vazio");
        }

        if(empty($usuario->getNomeMae()))
        {
            $resultadoValidacao->addErro('nomeMae',"Nome da Mãe: Este campo não pode ser vazio");
        }

        // if(empty($usuario->getInformacoes()))
        // {
        //     $resultadoValidacao->addErro('informacoes',"Informações: Este campo não pode ser vazio");
        // }

        return $resultadoValidacao;
    }
}
