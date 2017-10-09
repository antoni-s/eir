<?php

namespace App\Models\DAO;

use App\Models\Entidades\Unidade;
use App\Models\Paginacao;

class UnidadeDAO extends BaseDAO
{
    public  function buscaComPaginacao($buscaUnidade, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        // LIKE '%$buscaUnidade%' OR descricao
        $whereBusca = " WHERE nome
                                LIKE '%$buscaUnidade%' OR idu = '$buscaUnidade'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM unidade $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM unidade as unidade $whereBusca LIMIT $inicio,$totalPorPagina"
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['paginaSelecionada' => $paginaSelecionada,
                'totalPorPagina'    => $totalPorPagina,
                'totalLinhas'       => $totalLinhas,
                'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Unidade::class)];

    }
    public  function validaIdu($idu)
    {
        if($idu) {
            $resultado = $this->select(
                "SELECT count(*) as total FROM unidade WHERE idu = '$idu'"
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
                "SELECT * FROM unidade WHERE id = $id"
            );

            return $resultado->fetchObject(Unidade::class);
        }else{
            $resultado = $this->select(
                'SELECT * FROM unidade'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Unidade::class);
        }

        return false;
    }

    public  function salvar(Unidade $unidade)
    {
        try {

            $nome           = $unidade->getNome();
            // $status         = $unidade->getStatus();
            // $preco          = $unidade->getPreco();
            // $unidade        = $unidade->getUnidade();
            $idu            = $unidade->getIdu();
            $logradouro     = $unidade->getLogradouro();
            $bairro         = $unidade->getBairro();
            $cep            = $unidade->getCep();
            $cidade         = $unidade->getCidade();
            $uf             = $unidade->getUf();
            $complemento    = $unidade->getComplemento();
            // $descricao      = $unidade->getDescricao();

            return $this->insert(
                'unidade',
                // ":nome,:status,:preco,:unidade,:ean,:descricao",
                ":nome,:idu,:logradouro,:bairro,:cep,:cidade,:uf,:complemento",
                [
                    ':nome'=>$nome,
                    // ':status'=>$status,
                    // ':preco'=>$preco,
                    // ':unidade'=>$unidade,
                    ':idu'=>$idu,
                    ':logradouro'=>$logradouro,
                    ':bairro'=>$bairro,
                    ':cep'=>$cep,
                    ':cidade'=>$cidade,
                    ':uf'=>$uf,
                    ':complemento'=>$complemento,
                    // ':descricao'=>$descricao
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Unidade $unidade)
    {
        try {

            $id             = $unidade->getId();
            $nome           = $unidade->getNome();
            // $status         = $unidade->getStatus();
            // $preco          = $unidade->getPreco();
            // $unidade        = $unidade->getUnidade();
            $idu            = $unidade->getIdu();
            $logradouro     = $unidade->getLogradouro();
            $bairro         = $unidade->getBairro();
            $cep            = $unidade->getCep();
            $cidade         = $unidade->getCidade();
            $uf             = $unidade->getUf();
            $complemento    = $unidade->getComplemento();
            // $descricao      = $unidade->getDescricao();

            return $this->update(
                'unidade',
                // "nome = :nome,status = :status, preco = :preco, unidade = :unidade, ean = :ean, descricao = :descricao",
                "nome = :nome, idu = :idu, logradouro = :logradouro, bairro = :bairro,
                  cep = :cep, cidade = :cidade, uf = :uf, complemento = :complemento",
                [
                    ':id'=>$id,
                    ':nome'=>$nome,
                    // ':status'=>$status,
                    // ':preco'=>$preco,
                    // ':unidade'=>$unidade,
                    ':idu'=>$idu,
                    ':logradouro'=>$logradouro,
                    ':bairro'=>$bairro,
                    ':cep'=>$cep,
                    ':cidade'=>$cidade,
                    ':uf'=>$uf,
                    ':complemento'=>$complemento,
                    // ':descricao'=>$descricao,
                ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Unidade $unidade)
    {
        try {
            $id = $unidade->getId();

            return $this->delete('unidade',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
