<?php

namespace App\Models\DAO;

use App\Models\Entidades\Atendente;
use App\Models\Paginacao;

class AtendenteDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaAtendente, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        // LIKE '%$buscaAtendente%' OR descricao
        $whereBusca = " WHERE nome
                                LIKE '%$buscaAtendente%' OR idu = '$buscaAtendente'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM atendente $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM atendente as atendente $whereBusca LIMIT $inicio,$totalPorPagina"
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Atendente::class)];

    }
    public  function validaCpf($cpf)
    {
        if($cpf) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM atendente WHERE cpf = '$cpf'"
            );

            return $resultado->fetch()['total'];
        }else{
           return false;
        }

        return false;
    }
    public  function listar($id = null)
    {
        if($id) {
            $resultado = $this->select(
                "SELECT * FROM atendente WHERE id = $id"
            );

            return $resultado->fetchObject(Atendente::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM atendente'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Atendente::class);
        }

        return false;
    }

    public  function salvar(Atendente $atendente)
    {
        try {

            $nome           = $atendente->getNome();
            $cpf            = $atendente->getCpf();
            $matricula      = $atendente->getMatricula();
            $logradouro     = $atendente->getLogradouro();
            $bairro         = $atendente->getBairro();
            $cep            = $atendente->getCep();
            $cep            = explode("-", $cep);
            $cep            = $cep[0].$cep[1];
            $cidade         = $atendente->getCidade();
            $uf             = $atendente->getUf();
            $complemento    = $atendente->getComplemento();
            $telefone       = $atendente->getTelefone();
            $email          = $atendente->getEmail();

            return $this->insert(
                'atendente',
                // ":nome,:status,:preco,:unidade,:ean,:descricao",
                ":nome,:cpf,:matricula,:logradouro,:bairro,:cep,:cidade,:uf,:complemento,
                :telefone,:email",
                [
                    ':nome'=>$nome,
                    // ':status'=>$status,
                    // ':preco'=>$preco,
                    // ':unidade'=>$atendente,
                    ':cpf'=>$cpf,
                    ':matricula'=>$matricula,
                    ':logradouro'=>$logradouro,
                    ':bairro'=>$bairro,
                    ':cep'=>$cep,
                    ':cidade'=>$cidade,
                    ':uf'=>$uf,
                    ':complemento'=>$complemento,
                    ':telefone'=>$telefone,
                    ':email'=>$email,
                    // ':descricao'=>$descricao
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Atendente $atendente)
    {
        try {

            $id             = $atendente->getId();
            $nome           = $atendente->getNome();
            // $status         = $atendente->getStatus();
            // $preco          = $atendente->getPreco();
            // $unidade        = $unidade->getUnidade();
            $cpf            = $atendente->getCpf();
            $matricula      = $atendente->getMatricula();
            $logradouro     = $atendente->getLogradouro();
            $bairro         = $atendente->getBairro();
            $cep            = $atendente->getCep();
            $cep            = explode("-", $cep);
            $cep            = $cep[0].$cep[1];
            $cidade         = $atendente->getCidade();
            $uf             = $atendente->getUf();
            $complemento    = $atendente->getComplemento();
            $telefone       = $atendente->getTelefone();
            $email          = $atendente->getEmail();
            // $descricao      = $atendente->getDescricao();

            return $this->update(
                'atendente',
                // "nome = :nome,status = :status, preco = :preco, unidade = :unidade, ean = :ean, descricao = :descricao",
                "nome = :nome, cpf = :cpf, matricula = :matricula,
                  logradouro = :logradouro, bairro = :bairro, cep = :cep,
                  cidade = :cidade, uf = :uf, complemento = :complemento,
                  telefone = :telefone, email = :email",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    // ':status'=>$status,
                    // ':preco'=>$preco,
                    // ':unidade'=>$atendente,
                    ':cpf'=>$cpf,
                    ':matricula'=>$matricula,
                    ':logradouro'=>$logradouro,
                    ':bairro'=>$bairro,
                    ':cep'=>$cep,
                    ':cidade'=>$cidade,
                    ':uf'=>$uf,
                    ':complemento'=>$complemento,
                    ':telefone'=>$telefone,
                    ':email'=>$email,
                    // ':descricao'=>$descricao,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Atendente $atendente)
    {
        try {
            $id = $atendente->getId();

            return $this->delete('atendente',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
